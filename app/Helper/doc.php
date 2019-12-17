<?php
    function upload($field = ['image'], $size = [100, 100], $path = 'upload/')
    {
        $files = [];
        foreach ($field as $key => $img)
        {
            if(Request::hasFile($img))
            {
                $file = Request::file($img);
                $name = time()+($key+1).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize($size[0], $size[1])->save($path.$name);
                $files[$img] = $name;
            }
        }

        return $files;

        /*==============================================
                    In Controller Use upload();
        ==============================================*/

        // $img = upload(['logo', 'footer_logo'], [150, 150], 'upload/basic/');
        // if (isset($img['logo'])) {
        //     $data['logo'] = $img['logo'];
        //     if($id) dbClearFile('basic_info', ['id' => $id], 'upload/basic/', 'logo');
        // }

        // if (isset($img['footer_logo'])) {
        //     $data['footer_logo'] = $img['footer_logo'];
        //     if($id) dbClearFile('basic_info', ['id' => $id], 'upload/basic/', 'footer_logo');
        // }

        /*==============================================
                    In Controller Raw
        ==============================================*/

        // $files = ['logo', 'footer_logo'];
        // foreach ($files as $key => $file)
        // {
        //     if($request->hasFile($file))
        //     {
        //         $doc = $request->file($file);
        //         $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
        //         $path = 'upload/basic/';
        //         Image::make($doc)->resize('150','150')->save($path.$name);
        //         $data[$file] = $name;
        //         if($id) My_model::dbClearFile('basic_info', ['id' => $id], $path, $file);
        //     }
        // }
    }
?>