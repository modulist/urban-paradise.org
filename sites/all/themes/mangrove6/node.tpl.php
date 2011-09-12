<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	<?php print $picture ?>
	<?php if ($page == 0){ ?><h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2><?php } ?>
	<?php if ($submitted){ ?><span class="submitted"><?php print $submitted; ?></span><?php } ?>
	<div class="content clear-block"><?php print $content ?></div>
	<div class="clear-block">
		<?php /* <div class="meta">< ?php if ($taxonomy){ ? ><div class="terms">< ?php print $terms ? ></div>< ?php }? ></div> */?>
		<?php if ($links){ ?><div class="links"><?php print $links; ?></div><?php } ?>
	</div>
</div>
