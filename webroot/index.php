<?php

$meta=[];
$meta['title']='Chad Svastisalee';
$meta['description']='Chad Svastisalee Graphic Designer, Web Developer, Project Manager';
$meta['keywords']='Chad Svastisalee, Creative, Designer, Director, Mobile Developer';

$content = <<<EOT
<h1>Hello</h1>
<p>Welcome, This is Chad Svastisalee</p>
<img style="border-radius: 50%; float: right; margin-right: 1em;" src="https://s.gravatar.com/avatar/ccb8db9b92f24f1bf1dc575a85c78feb?s=80" alt="Chad-Svastisalee">
<!-- Gravator Image Box
    <img src="https://s.gravatar.com/avatar/ccb8db9b92f24f1bf1dc575a85c78feb?s=80" alt="Chad-Svastisalee">
-->
<h2>HTML Elements</h2>
    <p>
    To paraphrase the lesson text [...] For example &lt;h1&gt;h1&lt;h2&gt;title&lt;/h1&gt;... Notice the use of character entities when wanting show the tags in HTML.
    </p>
    <h2>Character Entities</h2>
    <p>Since the keyboard does not have a &copy; key we need a way to reference this so we say &amp;copy;. Additionally, greater than and less than are interpreted as HTML tags. These are examples of symbols that we may want to display but will not be able to with out a work around. This is where character entities come into play. </p>
    <ul>
        <li><a href="https://stackoverflow.com/questions/1016080/why-are-html-character-entities-necessary">A Stack Overflow thread on the topic.</a></li>
        <li><a href="https://en.wikipedia.org/wiki/List_of_XML_and_HTML_character_entity_references">A Wikipedia artcile on the topic.</a></li>
        <li><a href="https://dev.w3.org/html5/html-author/charref">The W3C reference.</a></li>
    </ul>
    <h2>Summary</h2>
    <p>In summation...</p>

EOT;

include '../core/layout.php';