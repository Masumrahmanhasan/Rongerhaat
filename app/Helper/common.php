<?php
    function source($path)
    {
        return asset($path);
    }

    function lazy($path = null)
    {
        return asset('assets/web/images/lazy/1.gif');
    }

    function sendEmail($to, $subject, $message){
        $headers = "From:  Muhit <info@muhit.com> \r\n";
        $headers .= "Reply-To: Muhit <info@muhit.com> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $send = mail($to, $subject, $message, $headers);
        return ($send) ? 'true' : 'false';
    }

    function sendEmailHtml($to, $subject, $message)
    {
        // email fields: to, from, subject, and so on
        $from = "RongerHaat"; 
        $headers = "From: $from";

        // boundary 
        $semi_rand = md5(time()); 
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

        // headers for attachment 
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

        // multipart boundary 
        $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
        $message .= "--{$mime_boundary}\n";

        $ok = @mail($to, $subject, $message, $headers); 
        if ($ok) { 
            return "<p>mail sent to $to!</p>";
        } else { 
            return "<p>mail could not be sent!</p>"; 
        }
    }

    function format_folder_size($size)
    {
        if ($size >= 1073741824)
        {
            $size = number_format($size / 1073741824, 2) . ' GB';
        }
        elseif ($size >= 1048576)
        {
            $size = number_format($size / 1048576, 2) . ' MB';
        }
        elseif ($size >= 1024)
        {
            $size = number_format($size / 1024, 2) . ' KB';
        }
        elseif ($size > 1)
        {
            $size = $size . ' bytes';
        }
        elseif ($size == 1)
        {
            $size = $size . ' byte';
        }
        else
        {
            $size = '0 bytes';
        }
     return $size;
    }

    function get_folder_size($folder_name)
    {
         $total_size = 0;
         $file_data = scandir($folder_name);
         foreach($file_data as $file)
         {
          if($file === '.' or $file === '..')
          {
           continue;
          }
          else
          {
           $path = $folder_name . '/' . $file;
           $total_size = $total_size + filesize($path);
          }
         }
         return format_folder_size($total_size);
    }

    function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function delete_files($dir) {
        if (is_dir($dir))
        {
            $objects = scandir($dir);
            foreach ($objects as $object)
            {
                if ($object != "." && $object != "..")
                {
                    if (filetype($dir."/".$object) == "dir") {
                        rrmdir($dir."/".$object); 
                    } else {
                        unlink($dir."/".$object);
                    }
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    function select_data($data, $key)
    {
        if(is_array($data))
        {
            $w = json_decode($data);
        } else {
            $w = explode(',', $data);
        }

        if($w != null)
        {
            foreach($w as $v)
            {
                if($v == $key)
                {
                    return 'selected';
                }
            }
        }
    }

    function tag($data,$type)
    {
        if($type == 'arr')
        {
            $all_tag = json_decode($data);
        } else {
            $all_tag = explode(',', $data);
        }

        $tags = '';
        foreach($all_tag as $v)
        {
            $tags .= '<a href="#" class="view_tag" style="margin-right: 5px;">'.$v.'</a>';
        }

        return $tags;
    }

    function generateToken($len = 32)
    {
        // Array of potential characters, shuffled.
        $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
        );
        shuffle($chars);
        $num_chars = count($chars) - 1;
        $token = '';
        // Create random token at the specified length.
        for ($i = 0; $i < $len; $i++)
        {
            $token .= $chars[mt_rand(0, $num_chars)];
        }
        return $token;
    }

    function captcha($len = 32)
    {
        // Array of potential characters, shuffled.
        $chars = array(
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M' 
        );
        shuffle($chars);
        $num_chars = count($chars) - 1;
        $token = '';
        // Create random token at the specified length.
        for ($i = 0; $i < $len; $i++)
        {
            $token .= $chars[mt_rand(0, $num_chars)];
        }
        return $token;
    }

    function uniqNum()
    {
        return mt_rand(1, 1000) + time();
    }

    function timeConvert($oldTime)
    {
        $total  = time() - (strtotime($oldTime) - 1);

        if($total > 0 && $total <= 60 ) { $diff = $total.' Sec. Ago'; }
        else if($total > 60  && $total <= 3600) { $diff = round($total/60).' Min. Ago'; }
        else if($total > 3600  && $total <= 86400) { $diff = round($total/3600).' Hours Ago'; }
        else if($total > 86400  && $total <= (86400*31)) { $diff = round($total/86400).' Days Ago'; }
        // else if($total > (86400*7)  && $total <= (86400*30)) { $diff = round($total/(86400*7),1).' Weeks Ago'; }
        else if($total > (86400*31)  && $total <= (86400*363)) { $diff = round($total/(86400*31),1).' Month Ago';}
        else if($total > (86400*363)  && $total <= (86400*99999999999999999999999999999999999999999999999999999999999999999999))
        {
            $diff = round($total/(86400*365)).' Years Ago';
        }
        else
        {
            $diff = 'N/A';
        }

        return $diff;
    }

    function arrayMatch($arr, $value)
    {
        if($arr != null)
        {
            $output = false;
            $w = (!is_array($arr)) ? explode(',', $arr) : $arr;
            foreach($w as $v)
            {
                if($v == $value)
                {
                    $output = true;
                    break;
                } else {
                    $output = false;
                }
            }

            return $output;
        }
    }

    function dbClearFile($table, $where, $path, $files, $sizes = null)
    {
        foreach ($files as $file) {
            $old_data = DB::table($table)->select($file)->where($where)->first();
            
            if (is_array($sizes)) {
                foreach ($sizes as $size) {
                    if($size.$old_data->$file && file_exists($path.$size.$old_data->$file)) { unlink($path.$size.$old_data->$file); }
                }
            } else {
                if($old_data->$file && file_exists($path.$old_data->$file)) { unlink($path.$old_data->$file); }
            }
        }
    }

    function msgFlash($text = 'Session Flash Text', $type = 'success', $key = 'msg')
    {
        session()->flash($key, ['text' => $text, 'type' => $type]);
    }

    function isSoftDl($class)
    {
        return method_exists($class, 'bootSoftDeletes');
    }

    function basic($key = null)
    {
        return ($key) ? session()->get('basic')->$key : session()->get('basic');
    }
?>