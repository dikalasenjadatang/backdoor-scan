<?php
	langsung saja, example: target.com\n\n";
		
		sleep(2);
		echo $banner;
		sleep(1);
		echo "Masukan Websitenya : ";
		$url  =  trim(fgets(STDIN));
		echo "\n\n";
		$protokol  =  "https://";
		$target  =  $protokol . $url;
		
		$lists  =  "list.txt";
		$open  =  fopen("$lists", "r");
		$size  =  filesize("$lists");
		$read  =  fread($open, $size);
		$lists  =  explode("\n", $read);
		
		if(empty($url)) {
			echo "masukan targetnya\n";
			exit;
		} else {
			foreach( $lists as $list ) {
				$web  =  $target . $list;
				$check  =  get_headers($web);
				if( preg_match("/200/", $check[0]) ) {
					echo "[+] $web => Found !!";
					break;
					echo "\n";
				} else {
					echo "[-] $web => Not Found !!";
					echo "\n\n";
				}
			}
		}