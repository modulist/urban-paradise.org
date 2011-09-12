<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
if ($block->content_reference)
{
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="clear-block block block-<?php print $block->module ?>">
	<?php if (!empty($block->subject)){ ?>
	<h2><?php print $block->subject ?></h2>
	<?php }?>
	<div class="content"><?php // print $block->content ?>
			<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module ?>">
				<div class="blockinner">
					<!-- block-8 by block-block-1: testimonials --->
					<div class="content">
						<div class="testimonial-block">
							<?php
							foreach($block->content_reference as $key=>$sidebarContent)
							{
								//print_r($sidebarContent);
								echo "<div class=\"testimonial-item\">";
								print "<div class=\"testimonial content\">";
								print ("<span class=\"hang-quote\">&ldquo;</span><p>".$sidebarContent->body."&rdquo;</p>");
								print "<br class=\"clear-both\" /></div>\n";
								if ($sidebarContent->field_person[0]['value']!="")
								{
									$jobTitle = "";
									if ($sidebarContent->field_job_title[0]['value']!="")
									{
										$jobTitle = "<span class=\"quote-separator\">-</span>&nbsp;".$sidebarContent->field_job_title[0]['value'];
									}
									print "<div class=\"testimonial originator-name\">";
									print ("<span class=\"hang-quote\">-</span><p>".$sidebarContent->field_person[0]['value'].$jobTitle."</p>");
									print "<br class=\"clear-both\" /></div>\n";
								}
								if ($key<count($node->field_content_reference)-1)
								{
									//print "<div class=\"dotted-horizontal\"><!-- empty --></div>\n";
								}
								echo "</div>";
							}
						?>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
<?php }?>
