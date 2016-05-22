<?php
/**
 * Created by PhpStorm.
 * User: Akash
 * Date: 5/10/2016
 * Time: 11:51 PM
 */

if (Session::has('success')){
?>    <!-- Form Error List -->
    <div class="alert alert-success">
        <ul>
                <li>{{ Session::get('success') }}</li>
        </ul>
    </div><?php
}