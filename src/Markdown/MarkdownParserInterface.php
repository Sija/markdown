<?php

namespace Markdown;

interface MarkdownParserInterface
{
    /**
     * Converts text to html using markdown rules
     *
     * @param string $text plain text
     * @return string rendered html
     */
    function transform($text);
}
