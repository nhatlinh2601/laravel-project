<?php
 foreach ($menus as  $value) {
            $roles = explode(',', $value->role);
            foreach ($roles as $item) {
               
                echo $item.'  ';
            }
        }
