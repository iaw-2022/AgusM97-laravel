@props([
    'user'
])

@php
    $default = base64_encode(file_get_contents("https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.webp"));
    $picture = is_null($user->picture)? $default : $user->picture;
@endphp

<img src="data:image/gif;base64,{{  $picture  }}" class="profile-pic rounded-circle">