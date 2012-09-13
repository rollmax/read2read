<?php
/*
 *  $Id$
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

/**
 * Easily create a slug for each record based on a specified set of fields
 *
 * @package     Doctrine
 * @subpackage  Template
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link        www.doctrine-project.org
 * @since       1.0
 * @version     $Revision$
 * @author      Konsta Vesterinen <kvesteri@cc.hut.fi>
 */
class myDoctrine_Template_Listener_Sluggable extends Doctrine_Template_Listener_Sluggable
{
    
    protected function buildSlugFromFields($record)
    {
        if (empty($this->_options['fields'])) {
            if (is_callable($this->_options['provider'])) {
            	$value = call_user_func($this->_options['provider'], $record);
            } else if (method_exists($record, 'getUniqueSlug')) {
                $value = $record->getUniqueSlug($record);
            } else {
                $value = (string) $record;
            }
        } else {
            $value = '';
            foreach ($this->_options['fields'] as $field) {
                $value .= $record->$field . ' ';
            }
            $value = substr($value, 0, -1);
        }

        if ($this->_options['unique'] === true) {
          $value = $this->getUniqueSlug($record, $value);
        } else {
          $value =  call_user_func_array($this->_options['builder'], array($value, $record));
        }

        // now add id as prefix
        if ( ! $record->exists()) {
          // get last id
          $last_id = Doctrine_Query::create()
                  ->select('MAX(e.id) as last_id')
                  ->from(get_class($record).' e')
                  ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
          $new_id = ++$last_id;
          $value = $value.'-'.$new_id;
        } else {
          $value = $value.'-'.$record->id;
        }
        //-- append id

        return $value;

    }

}