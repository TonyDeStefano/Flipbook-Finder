<?php

if ( ! defined( 'ABSPATH' ) )
{
    exit;
}

/** @var \FlipFind\Controller $this */

$flipbooks = $this->get_flipbooks();

var_dump(ABSPATH);

?>

<div class="wrap">

	<h1>
		Flipbook Finder
	</h1>

	<ul>
        <?php foreach ( $flipbooks as $flipbook ) { ?>
            <li>
                <a href="<?php echo $flipbook; ?>" target="_blank"><?php echo $flipbook; ?></a>
            </li>
        <?php } ?>
    </ul>

</div>