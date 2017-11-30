<?php

if( site()->maintenance() == 'on' &&
    page()->uid() != 'maintenance' &&
    !class_exists('Panel') &&
    !site()->user()) {
    go('maintenance');
}

if( site()->maintenance() == 'off' &&
page()->uid() == 'maintenance') {
go('/');
}
