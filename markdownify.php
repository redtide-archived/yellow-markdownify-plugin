<?php
// Copyright (c) 2016-2017 Andrea Zanellato
// This file may be used and distributed under the terms of the public license.

class YellowMarkdownify
{
	const Version = "0.0.1";
	var $yellow;

	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;

		// jQuery
		if(!$this->yellow->config->isExisting("jqueryCdn"))
		{
			$this->yellow->config->setDefault("jqueryCdn",
				"https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/");
		}
		// Codemirror
		$this->yellow->config->setDefault("codeMirrorCdn",
			"https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/");

		// Marked Markdown Parser
		$this->yellow->config->setDefault("markedCdn",
			"https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.5/");

		// Markdownify
		$this->yellow->config->setDefault("markdownifyCdn",
			"https://cdn.rawgit.com/tibastral/markdownify/master/lib/");
	}

	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name == "header")
		{
			$jqCDN  = $this->yellow->config->get("jqueryCdn");
			$cmCdn  = $this->yellow->config->get("codeMirrorCdn");
			$mkdCdn = $this->yellow->config->get("markedCdn");
			$mdfCdn = $this->yellow->config->get("markdownifyCdn");
			$mdfPth = $this->yellow->config->get("serverBase").
						$this->yellow->config->get("pluginLocation");
			// jQuery
			$output .= "<script type=\"text/javascript\" src=\"{$jqCDN}jquery.min.js\"></script>\n";

			// Codemirror Code Editor
			$output .= "<script type=\"text/javascript\" src=\"{$cmCdn}codemirror.min.js\"></script>\n";
			$output .= "<script type=\"text/javascript\" src=\"{$cmCdn}addon/edit/continuelist.min.js\"></script>\n";
			$output .= "<script type=\"text/javascript\" src=\"{$cmCdn}addon/display/autorefresh.min.js\"></script>\n";
			$output .= "<script type=\"text/javascript\" src=\"{$cmCdn}mode/xml/xml.min.js\"></script>\n";
			$output .= "<script type=\"text/javascript\" src=\"{$cmCdn}mode/markdown/markdown.js\"></script>\n";
			$output .= "<link rel=\"stylesheet\" href=\"{$cmCdn}codemirror.min.css\">\n";

			// Marked Markdown Parser
			$output .= "<script type=\"text/javascript\" src=\"{$mkdCdn}marked.min.js\"></script>\n";

			// Markdownify
			$output .= "<script type=\"text/javascript\" src=\"{$mdfCdn}jquery.markdownify.js\"></script>\n";
			$output .= "<link rel=\"stylesheet\" href=\"{$mdfCdn}jquery.markdownify.css\">\n";

			// Plugin
			$output .= "<script type=\"text/javascript\" src=\"{$mdfPth}markdownify.js\"></script>\n";
		}
		return $output;
	}
}

$yellow->plugins->register("markdownify", "YellowMarkdownify", YellowMarkdownify::Version);
?>
