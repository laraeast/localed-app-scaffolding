<?php

// Register all created breadcrumbs.
foreach (glob(__DIR__.'/breadcrumbs/*.php') as $breadcrumb) {
    require $breadcrumb;
}
