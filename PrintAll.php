<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Print
 *
 * @author luis
 */
class PrintAll {

    public static function exec($path, $directories, $files) {
        $list = explode('/', $path);

        $route = "";
        foreach ($list as $l) {
            if (!empty($l))
                $route .= $l . " > ";
        }

        echo rtrim($route, " > ");
        echo '<table  border="1" style="width:80%"><tr><th>Name</th><th>Created</th><th>Directory</th></tr>';
        foreach ($directories as $directory) {
            echo '<tr><td><a href="?s=' . $directory['name'] . '">' . $directory['name'] . '</a></td>';
            echo '<td>' . $directory['created_at'] . '</td>';
            echo '<td><input type="checkbox" disabled readonly checked></td></tr>';
        }

        foreach ($files as $file) {
            echo '<tr><td>' . $file['name'] . '</td>';
            echo '<td>' . $file['created_at'] . '</td>';
            echo '<td><input type="checkbox" disabled readonly></td></tr>';
        }

        echo '</table> ';
    }

}
