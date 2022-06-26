<?php if($template=='product/product_detail') { ?>
    <!-- Product -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org/",
            "@type": "CreativeWorkSeries",
            "name": "<?=@$row_detail['ten'.$lang]?>",
            "image": "<?=$config_base.UPLOAD_PRODUCT_L.@$row_detail['photo']?>",
            "description": "<?=$seo->getSeo('description')?>",
            "datePublished":"<?=date('Y-m-d',$row_detail['ngaytao'])?>",
            <?php if($row_detail['ngaysua']){ ?>
                "dateModified" : "<?=date('Y-m-d',$row_detail['ngaysua'])?>",
            <?php } ?>
            "headline": "<?=@$row_detail['ten'.$lang]?>",
            "author":
                {
                    "@type": "Person",
                    "name": "BẤT ĐỘNG SẢN HÒA PHÁT "
                },

            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "<?=$rating?>",
                "reviewCount": "<?=(@$row_detail['review_count'] >0) ? $row_detail['review_count'] : 1?>",
                "bestRating": "5",
                "worstRating": "1"
            },
            "publisher": {
                "@type": "Organization",
                "name": "<?=@$setting['ten'.$lang]?>",
                "logo":
                {
                    "@type": "ImageObject",
                    "url": "<?=$config_base.UPLOAD_PHOTO_L.@$logo['photo']?>"
                }
            }
        }
</script>
<?php /*
<script type="application/ld+json">{
"@context": "https://schema.org/",
"@type": "CreativeWorkSeries",
"name": "<?=@$row_detail['ten'.$lang]?>",
"aggregateRating": {
"@type": "AggregateRating",
"ratingValue": "<?=$rating?>",
"bestRating": "5",
"ratingCount": "<?=(@$row_detail['review_count'] >0) ? $row_detail['review_count'] : 1?>"
}
}
</script>*/ ?>
<?php } else if($template=='news/news_detail') { ?>
    <!-- News -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage":
            {
                "@type": "WebPage",
                "@id": "https://google.com/article"
            },
            "headline": "<?=@$row_detail['ten'.$lang]?>",
            "image":
            [
            "<?=$config_base.UPLOAD_NEWS_L.@$row_detail['photo']?>"
            ],
            "datePublished": "<?=date('Y-m-d',@$row_detail['ngaytao'])?>",
            "dateModified": "<?=date('Y-m-d',@$row_detail['ngaysua'])?>",
            "author":
            {
                "@type": "Person",
                "name": "<?=@$setting['ten'.$lang]?>"
            },
            "publisher":
            {
                "@type": "Organization",
                "name": "Google",
                "logo":
                {
                    "@type": "ImageObject",
                    "url": "<?=$config_base.UPLOAD_PHOTO_L.@$logo['photo']?>"
                }
            },
            "description": "<?=$seo->getSeo('description')?>"
        }
    </script>
<?php } else if($template=='static/static') { ?>
    <!-- Static -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage":
            {
                "@type": "WebPage",
                "@id": "https://google.com/article"
            },
            "headline": "<?=@$static['ten'.$lang]?>",
            "image":
            [
            "<?=$config_base.UPLOAD_PHOTO_L.@$static['photo']?>"
            ],
            "datePublished": "<?=date('Y-m-d',@$static['ngaytao'])?>",
            "dateModified": "<?=date('Y-m-d',@$static['ngaysua'])?>",
            "author":
            {
                "@type": "Person",
                "name": "<?=@$setting['ten'.$lang]?>"
            },
            "publisher":
            {
                "@type": "Organization",
                "name": "Google",
                "logo":
                {
                    "@type": "ImageObject",
                    "url": "<?=$config_base.UPLOAD_PHOTO_L.@$logo['photo']?>"
                }
            },
            "description": "<?=$seo->getSeo('description')?>"
        }
    </script>
<?php } else { ?>
    <!-- General -->
    <script type="application/ld+json">
        {
            "@context" : "https://schema.org",
            "@type" : "Organization",
            "name" : "<?=@$setting['ten'.$lang]?>",
            "url" : "<?=$config_base?>",
            "sameAs" :
            [
            <?php if(isset($social) && count($social) > 0) { $sum_social = count($social); foreach($social as $key => $value) { ?>
                "<?=@$value['link']?>"<?=(($key+1)<$sum_social)?',':''?>
            <?php } } ?>
            ],
            "address":
            {
                "@type": "PostalAddress",
                "streetAddress": "<?=$optsetting['diachi'.$lang]?>",
                "addressRegion": "Ho Chi Minh",
                "postalCode": "70000",
                "addressCountry": "vi"
            }
        }
    </script>
    <?php } ?>