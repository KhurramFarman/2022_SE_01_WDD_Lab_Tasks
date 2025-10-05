<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="index, follow" />
    <meta name="theme-color" content="#02B578" />
    <link rel="sitemap" type="application/xml" href="/sitemap.xml" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?= $pageDescription ?? 'Default site description goes here.'; ?>">
    <meta name="keywords" content="<?= $keyWords?? ''; ?>">
    <meta name="author" content="Cliffside" />
    <link rel="canonical" href="<?= $canonicalUrl ?? 'https://www.jumboloan.com/'; ?> ">
    <meta property="og:title" content="Cliffside" />
    <meta property="og:type" content="Cliffside" />
    <meta property="og:url" content="<?= $ogUrl ?? 'https://www.cliffside.com.au/'; ?>" />
    <meta property="og:image" content="<?= $ogImage ?? ''; ?>" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:label1" content="Est. reading time">
    <meta name="twitter:data1" content="<?= $estimatedReadTime ?? '3 minutes'; ?>">
    <link rel="shortcut icon" href="assets/Group.webp" type="image/x-icon">

    <title><?= $title ?? 'CliffSide'; ?></title>

    <!-- Tailwind css link -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        media="all" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" media="all" />
    <link href="style.css" rel="Stylesheet" />

    <!-- Favicon for branding -->
</head>