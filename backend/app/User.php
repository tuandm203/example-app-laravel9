<?php

use App\Models\User;

 function getUser(){
    return User::find(auth()->id())->name;
}