<?php

class ReadToRead
{

  /**
   * Creates folders structure based on got $id in $path folder
   *
   * @param <string> $path
   * @param <integer> $id
   * @return (bool) false | (string) created path
   */
  static public function checkDir($path , $id)
  {
    $levelOne   = intval($id/100000);
    $levelTwo   = intval(($id%100000)/1000);
    $levelThree = intval(($id%100000)%1000/100);

    if (!is_dir($path .'/'.$levelOne))
      if(!mkdir($path .'/'.$levelOne, 0777))
        return false;
      if(!chmod($path .'/'.$levelOne, 0777))
        return false;

    if (!is_dir($path .'/'.$levelOne.'/'.$levelTwo))
      if(!mkdir($path .'/'.$levelOne.'/'.$levelTwo, 0777))
        return false;
      if(!chmod($path .'/'.$levelOne.'/'.$levelTwo, 0777))
        return false;

    if (!is_dir($path .'/'.$levelOne.'/'.$levelTwo.'/'.$levelThree))
      if(!mkdir($path .'/'.$levelOne.'/'.$levelTwo.'/'.$levelThree, 0777))
        return false;
      if(!chmod($path .'/'.$levelOne.'/'.$levelTwo.'/'.$levelThree, 0777))
        return false;

    return $path .'/'. $levelOne.'/'.$levelTwo.'/'.$levelThree;
  }

  /**
   * Crop and save file to filesystem at the inputted folder
   *
   * @param sfValidatedFile $file
   * @param <string> $path
   * @param <integer> $width
   * @param <integer> $height
   * @param <boolean> $crop
   * @return <boolean> false | <string> saved file location
   */
  public static function savePicture(sfValidatedFile $file, $path, $width, $height, $crop)
  {
    $filename = $file->getOriginalName();
    

    $img = new Upload($file->getTempName());

    $pos = strrpos($filename, '.') +1;
    $type = substr($filename, $pos);
    $newName = $basename = md5(substr($filename, 0, --$pos).rand(1111, 9999));

    $img->file_new_name_body = $newName;
    $img->file_new_name_ext  = $type;
    $img->file_is_image = true;
    $img->image_resize = true;
    $img->image_src_type = strtolower($type);


    // check for resize x
    if($img->image_src_x > $width)
      $img->image_x = $width;
    else
      $img->image_x = $img->image_src_x;

    // check for resize y
    if($img->image_src_y > $height)
      $img->image_y = $height;
    else
      $img->image_y = $img->image_src_y;

    $img->image_ratio_crop = $crop;
    $img->file_auto_rename = false;
    $img->file_overwrite = true;

    // execution
    $img->process($path);
    if (!file_exists($path . '/' . $img->file_dst_name))
      return false;
    if(!chmod($path . '/' . $img->file_dst_name, 0777))
      return false;
    else
      return $path . '/' . $img->file_dst_name;
    
  }


}