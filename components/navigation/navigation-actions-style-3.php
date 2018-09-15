<?php
$url = "https://login.microsoftonline.com/login.srf?wa=wsignin1.0&whr=esmgquadrivium.nl&wreply=https://esmgquadrivium.sharepoint.com&LoginOptions=1";
$display_text = WPGlobus_Filters::filter__text("{:en}For members{:}{:nl}Voor leden{:}");
?>
<nav id="user-navigation">
    <ul>
        <li>
            <a href="<?php echo $url; ?>"><?php echo $display_text; ?></a>
        </li>
    </ul>
</nav>
