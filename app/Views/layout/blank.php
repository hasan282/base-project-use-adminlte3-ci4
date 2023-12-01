<?php

var_dump(sha3hash('text 0123'));

var_dump(sha3hash('text0123', 50));

var_dump(sha3hash('text 0123 ad', 70));

var_dump(sha3hash('textt0123mad', 30));
