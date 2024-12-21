<?php

class urlhelper extends helper
{

	public function link($url, $value)
	{
		return '<a href="'.$url.'">'.$value.'</a>';
	}
        
        function anchor($link, $text, $css) // 1
        {
            $domain = get_domain(); // 2
            $link = $domain . $link; // 3

            $data = '<a href="' . $link . '"';
            $data .= ' title="' . $text . '"'; //4
            $data .= ' '.$css.''; //4
            $data .= '>';
            $data .= $text; //4
            $data .= "</a>";

            return $data;
        }
}