<?php

/**
 * Front Modal Template
 */

?>

<div id="flexiview-modal" class="flexiview-modal is-open">
    <div class="flexiview-modal__content">
        <div class="flexiview-modal__header">
            <div class="flexiview-modal__controls flexiview-cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="32" height="32" viewBox="0 0 256 256" xml:space="preserve">
                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                        <path d="M 75.702 53.014 c -2.142 7.995 -7.27 14.678 -14.439 18.816 c -7.168 4.138 -15.519 5.239 -23.514 3.095 c -16.505 -4.423 -26.335 -21.448 -21.913 -37.953 C 20.258 20.467 37.286 10.64 53.79 15.06 c 4.213 1.129 8.076 3.118 11.413 5.809 l -8.349 8.35 h 26.654 V 2.565 l -8.354 8.354 c -5.1 -4.405 -11.133 -7.61 -17.74 -9.381 C 33.451 -4.882 8.735 9.389 2.314 33.35 c -6.42 23.961 7.851 48.678 31.811 55.098 C 38.001 89.486 41.934 90 45.842 90 c 7.795 0 15.488 -2.044 22.42 -6.046 c 10.407 -6.008 17.851 -15.709 20.962 -27.317 L 75.702 53.014 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    </g>
                </svg>
            </div>
            <div class="flexiview-modal__title">
                <h4>FlexiView Accessability</h4>
            </div>
            <div id="flexiview-close-modal" class="flexiview-modal__close flexiview-cursor-pointer">
                <svg width="40" height="40" viewbox="0 0 40 40">
                    <path d="M 10,10 L 30,30 M 30,10 L 10,30" stroke="black" stroke-width="4" />
                </svg>
            </div>
        </div>
        <div class="flexiview-modal__main">
            <!-- Main content like font size, background color controls -->
            <div class="flexiview-accessibility-accordion-container">
                <h4 class="flexiview-accessibility-accordion-title flexiview-cursor-pointer active" accessible-i18n="contentControlHeader">
                    Content Controls
                    <span class="flexiview-accessibility-accordion-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                            <path d="M7.247 4.86l-4.796 5.481C1.982 10.933 2.48 12 3.4 12h9.2c.92 0 1.418-1.067.949-1.659L8.753 4.86a1 1 0 0 0-1.506 0z" />
                        </svg>
                    </span>
                </h4>
                <div class="flexiview-accessibility-accordion-content grid active" id="accessibility-content-container">
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="readable-font" data-group="font-style">Readable Font<span class="notice">May break icons</span></div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="dyslexia-font" data-group="font-style">Dyslexia Font<span class="notice">May break icons</span></div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="highlight-titles">Highlight Titles</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="highlight-links">Highlight Links</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12 col-span-lg-12" id="text-magnifier">Text Magnifier</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6 inprogress" id="content-scaling">Content Scaling (Slider)</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6 inprogress" id="font-size">Font Size (Slider)</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6 inprogress" id="line-height">Line Height (Slider)</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6 inprogress" id="letter-spacing">Letter Spacing (Slider)</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-4" id="align-left" data-group="text-align">Left Aligned</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-4" id="align-center" data-group="text-align">Center Aligned</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-4" id="align-right" data-group="text-align">Right Aligned</div>
                    <!--
                        <div class="flexiview-accessibility-mode accessibility-option-togle col-span-sm-12  col-span-lg-6" id="text-ltr">Text LTR</div>
                        <div class="flexiview-accessibility-mode accessibility-option-togle col-span-sm-12  col-span-lg-6" id="text-rtl">Text RTL</div>
                    -->
                </div>
            </div>
            <!--  -->
            <div class="flexiview-accessibility-accordion-container">
                <h4 class="flexiview-accessibility-accordion-title flexiview-cursor-pointer" accessible-i18n="contentControlHeader">
                    Design Controls
                    <span class="flexiview-accessibility-accordion-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                            <path d="M7.247 4.86l-4.796 5.481C1.982 10.933 2.48 12 3.4 12h9.2c.92 0 1.418-1.067.949-1.659L8.753 4.86a1 1 0 0 0-1.506 0z" />
                        </svg>
                    </span>
                </h4>
                <div class="flexiview-accessibility-accordion-content grid" id="accessibility-view-container">
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="dark-contrast" data-group="design-control">Dark Contrast</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="invert-colors" data-group="design-control">Invert Colors</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="light-contrast" data-group="design-control">Light Contrast</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="monochrome" data-group="design-control">Monochrome</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="high-contrast" data-group="design-control">High Contrast</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="high-saturation" data-group="design-control">High Saturation</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="low-saturation" data-group="design-control">Low Saturation</div>
                </div>
            </div>
            <div class="flexiview-accessibility-accordion-container">
                <h4 class="flexiview-accessibility-accordion-title flexiview-cursor-pointer" accessible-i18n="contentControlHeader">
                    Media and Other Controls
                    <span class="flexiview-accessibility-accordion-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                            <path d="M7.247 4.86l-4.796 5.481C1.982 10.933 2.48 12 3.4 12h9.2c.92 0 1.418-1.067.949-1.659L8.753 4.86a1 1 0 0 0-1.506 0z" />
                        </svg>
                    </span>
                </h4>
                <div class="flexiview-accessibility-accordion-content grid" id="accessibility-models-container">
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6 needtest" id="mute-sounds">Mute Sounds</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="hide-images">Hide Images</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="reading-guide">Reading Guide</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="stop-animations">Stop Animations</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="reading-mask">Reading Mask</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="highlight-hover">Highlight Hover</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="highlight-focus">Highlight Focus</div>
                    <div class="flexiview-accessibility-mode accessibility-option-togle flexiview-cursor-pointer col-span-sm-12  col-span-lg-6" id="large-cursor">Large Cursor</div>
                </div>
            </div>
        </div>
        <div class="flexiview-modal__footer">
            <div class="mp-copyright">
                <a class="mp-copyright-link" href="https://marketingplanet.agency/" target="_blank">
                    <span>Marketing Planet Agency</span>
                    <img class="mp-copyright-img" src="<?php echo FLEXIVIEW_MP_URL . 'assets/images/mp-logo.webp'; ?>" alt="" width="200">
                </a>
            </div>
        </div>
    </div>
</div>