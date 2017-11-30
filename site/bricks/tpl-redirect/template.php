<?php

if ($page->redirect()->isEmpty() && $page->hasVisibleChildren()) {
  go($page->children()->visible()->first()->url());
}
else {
  go ($page->redirect());
}
