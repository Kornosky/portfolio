 <?php
     $files = glob("images/2dworks/*.*");
     for ($i=0; $i<count($files); $i++)
      {
        $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
         );

         $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
         if (in_array($ext, $supported_file)) {

             echo ' <img style=\'height: 100%; width: 100%; object-fit: contain\' src="'.$image .'" alt="Random image" /> ';
            } else {
                continue;
            }
          }
       ?>
