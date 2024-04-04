@extends('errors::layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('mensaje', __('No encontrado'))
<style>
    svg {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }

    svg#freepik_stories-404-error-with-a-cute-animal:not(.animated) .animable {
        opacity: 0;
    }

    svg#freepik_stories-404-error-with-a-cute-animal.animated #freepik--Plant--inject-18 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown, 1.5s Infinite linear floating;
        animation-delay: 0s, 1s;
    }

    svg#freepik_stories-404-error-with-a-cute-animal.animated #freepik--Character--inject-18 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft, 1.5s Infinite linear floating;
        animation-delay: 0s, 1s;
    }

    svg#freepik_stories-404-error-with-a-cute-animal.animated #freepik--Sign--inject-18 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown, 1.5s Infinite linear floating;
        animation-delay: 0s, 1s;
    }

    @keyframes slideDown {
        0% {
            opacity: 0;
            transform: translateY(-30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes floating {
        0% {
            opacity: 1;
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            opacity: 1;
            transform: translateY(0px);
        }
    }

    @keyframes slideLeft {
        0% {
            opacity: 0;
            transform: translateX(-30px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>
<div class="mx-auto">
    <svg class="animated" id="freepik_stories-404-error-with-a-cute-animal" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" version="1.1"
        xmlns:svgjs="http://svgjs.com/svgjs">
        <style>
            svg#freepik_stories-404-error-with-a-cute-animal:not(.animated) .animable {
                opacity: 0;
            }

            svg#freepik_stories-404-error-with-a-cute-animal.animated #freepik--Plant--inject-18 {
                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown, 1.5s Infinite linear floating;
                animation-delay: 0s, 1s;
            }

            svg#freepik_stories-404-error-with-a-cute-animal.animated #freepik--Character--inject-18 {
                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft, 1.5s Infinite linear floating;
                animation-delay: 0s, 1s;
            }

            svg#freepik_stories-404-error-with-a-cute-animal.animated #freepik--Sign--inject-18 {
                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown, 1.5s Infinite linear floating;
                animation-delay: 0s, 1s;
            }

            @keyframes slideDown {
                0% {
                    opacity: 0;
                    transform: translateY(-30px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes floating {
                0% {
                    opacity: 1;
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0px);
                }
            }

            @keyframes slideLeft {
                0% {
                    opacity: 0;
                    transform: translateX(-30px);
                }

                100% {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
        </style>
        <g id="freepik--Floor--inject-18" class="animable" style="transform-origin: 247.958px 352.312px;">
            <path id="freepik--floor--inject-18"
                d="M410.25,259c-89.63-51.53-234.95-51.53-324.58,0s-89.62,135.09,0,186.62,234.94,51.54,324.57,0S499.87,310.5,410.25,259Z"
                style="fill: rgb(245, 245, 245); transform-origin: 247.958px 352.312px; --darkreader-inline-fill: #e2dfdb;"
                class="animable" data-darkreader-inline-fill=""></path>
        </g>
        <g id="freepik--Shadows--inject-18" class="animable" style="transform-origin: 238.628px 387.937px;">
            <ellipse id="freepik--Shadow--inject-18" cx="351.59" cy="353.98" rx="40.97" ry="23.65"
                style="fill: rgb(224, 224, 224); transform-origin: 351.59px 353.98px; --darkreader-inline-fill: #d4d1cb;"
                class="animable" data-darkreader-inline-fill=""></ellipse>
            <path id="freepik--shadow--inject-18"
                d="M302.71,395.39c-16.36-1.51-30.28-.47-41.34,1.82-1.46-10.44-10-20.66-25.68-28.64-34.54-17.61-90.55-17.61-125.09,0s-34.54,46.16,0,63.77,90.55,17.6,125.09,0A74.66,74.66,0,0,0,246.05,426a143.47,143.47,0,0,0,34.5,3.53l1.19.39a98.94,98.94,0,0,0,29.07,4.75c7.63,0,14-1.21,17.6-3.66a10.91,10.91,0,0,0,1.08-.83c4.72.14,9.85.33,15.25-.75,7.83-1.58,11.67-5,11.45-9.12C355.64,410,325.6,397.49,302.71,395.39ZM281,426.21c-6.72-2.47-10.3-5.84-9.9-9.38.53-4.66,7.41-8.86,15.67-9.55,1.14-.09,2.31-.14,3.47-.14,6.37,0,12.9,1.36,17,3.35a18.05,18.05,0,0,0-5.42.91c-2.47.85-3.61,2.83-3,5.17.48,1.76,2,3.69,4.32,5.54C297.41,424.66,289.59,425.94,281,426.21Zm26.88-12.47a22.35,22.35,0,0,1,3.61.3,1.43,1.43,0,0,1,.09.27c.49,1.74-1.34,3.92-5.08,6.11-2.57-1.72-4.11-3.45-4.45-4.71-.11-.39-.23-.84.88-1.22A15.24,15.24,0,0,1,307.86,413.74ZM290,428.81a50.6,50.6,0,0,0,15.84-4.33l.51-.26a46.88,46.88,0,0,0,17.36,5.5C316.47,432.3,303.14,431.92,290,428.81Zm38.11-2a47.33,47.33,0,0,1-18.4-4.59c3.56-2.39,5.31-4.89,5.23-7.46a29.4,29.4,0,0,1,9.7,4.68c2.65,2,4.09,4.18,4,5.91A3,3,0,0,1,328.09,426.85Zm16-.63c-4.44.9-8.62.71-12.48.73a6.47,6.47,0,0,0,.24-1.33c.2-2.88-1.66-6-5.24-8.73a33.53,33.53,0,0,0-13.14-5.81c-4.39-5.46-17.77-7.82-27-7.06-9.92.84-17.94,6.18-18.65,12.44-.27,2.37.36,6.22,5.69,9.74a147.72,147.72,0,0,1-24.14-2.85c8.14-7,12.21-15,12.22-22.88,10.79-2.28,24.52-3.33,40.81-1.83,23.95,2.2,50.14,14.7,50.52,21.84C353,422.61,349.83,425.07,344.09,426.22Z"
                style="fill: rgb(224, 224, 224); transform-origin: 220.447px 400.453px; --darkreader-inline-fill: #d4d1cb;"
                class="animable" data-darkreader-inline-fill=""></path>
        </g>
        <g id="freepik--Clouds--inject-18" class="animable" style="transform-origin: 128.46px 81.4342px;">
            <g id="freepik--clouds--inject-18" class="animable" style="transform-origin: 128.46px 81.4342px;">
                <path
                    d="M137.17,59.22l-11.46,6.61a13,13,0,0,0,.1-1.51V61c0-5.91-4.15-8.3-9.27-5.35A17.92,17.92,0,0,0,111,61c-.83-7.43-6.66-10.2-13.74-6.11-7.65,4.42-13.86,15.16-13.86,24v5a13.07,13.07,0,0,0,1.18,5.75l-9.52,5.49a11.37,11.37,0,0,0-5.14,8.9c0,3.28,2.3,4.61,5.14,3l62.09-35.85a11.38,11.38,0,0,0,5.14-8.9C142.31,58.91,140,57.58,137.17,59.22Z"
                    style="fill: rgb(235, 235, 235); transform-origin: 106.105px 80.3557px; --darkreader-inline-fill: #dbd8d4;"
                    id="el79e3y4slus" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M183.72,79l-7.31,4.22a8,8,0,0,0,.06-1V80.13c0-3.76-2.64-5.29-5.9-3.4a11.39,11.39,0,0,0-3.52,3.38c-.54-4.74-4.25-6.5-8.76-3.89-4.88,2.81-8.84,9.66-8.84,15.3v3.17a8.27,8.27,0,0,0,.75,3.66l-6.07,3.51a7.23,7.23,0,0,0-3.28,5.67c0,2.09,1.47,2.94,3.28,1.89l39.59-22.85A7.25,7.25,0,0,0,187,80.89C187,78.8,185.53,78,183.72,79Z"
                    style="fill: rgb(235, 235, 235); transform-origin: 163.925px 92.4406px; --darkreader-inline-fill: #dbd8d4;"
                    id="el0uhsed9z4ef" class="animable" data-darkreader-inline-fill=""></path>
            </g>
        </g>
        <g id="freepik--Plant--inject-18" class="animable" style="transform-origin: 364.757px 319.537px;">
            <g id="freepik--Plants--inject-18" class="animable" style="transform-origin: 364.757px 319.537px;">
                <path
                    d="M345.19,350.33a126.12,126.12,0,0,1,2.06-35c2.66-13.82,10.59-25,20.08-30.26,3.29-1.81,10.17-3.75,14.67.31,4.29,3.87,2,10.1-3.25,16.51-10.34,12.62-20.53,23.18-23.32,39.74l-1.16,12.28Z"
                    style="fill: rgb(186, 104, 200); transform-origin: 364.512px 318.447px; --darkreader-inline-fill: #be70cb;"
                    id="elvvi33rvuo4i" class="animable" data-darkreader-inline-fill=""></path>
                <g id="el4d5mx07k4ov">
                    <path
                        d="M345.19,350.33a126.12,126.12,0,0,1,2.06-35c2.66-13.82,10.59-25,20.08-30.26,3.29-1.81,10.17-3.75,14.67.31,4.29,3.87,2,10.1-3.25,16.51-10.34,12.62-20.53,23.18-23.32,39.74l-1.16,12.28Z"
                        style="opacity: 0.2; transform-origin: 364.512px 318.447px;" class="animable"></path>
                </g>
                <path
                    d="M348.39,348.78a.52.52,0,0,1-.52-.52c0-16,3.39-29.85,10.37-42.35,4.6-8.26,10.24-14.26,17.22-18.34a.52.52,0,0,1,.71.19.51.51,0,0,1-.19.7c-6.82,4-12.33,9.85-16.85,18-6.88,12.35-10.23,26-10.23,41.85A.51.51,0,0,1,348.39,348.78Z"
                    style="fill: rgb(255, 255, 255); transform-origin: 362.054px 318.14px; --darkreader-inline-fill: #e8e6e3;"
                    id="elq98hbzw5yqp" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M359.61,356.09c0-3.93,2.62-11.21,8.32-18.25,6.3-7.8,15.57-13.26,16.62-18.19,1.27-5.92-4.17-8.8-12.22-6-9.67,3.42-19.21,16.73-18.06,40.23Z"
                    style="fill: rgb(186, 104, 200); transform-origin: 369.455px 334.331px; --darkreader-inline-fill: #be70cb;"
                    id="el1a5rt45p7g" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M357.29,352.59a.47.47,0,0,0,.31-.43c1.19-20.82,13.23-31.51,19.63-34.34a.5.5,0,0,0,.25-.65.49.49,0,0,0-.65-.25c-7.08,3.13-19,13.93-20.21,35.19a.51.51,0,0,0,.47.52A.45.45,0,0,0,357.29,352.59Z"
                    style="fill: rgb(255, 255, 255); transform-origin: 367.07px 334.754px; --darkreader-inline-fill: #e8e6e3;"
                    id="el9lbxko8g54o" class="animable" data-darkreader-inline-fill=""></path>
            </g>
        </g>
        <g id="freepik--Character--inject-18" class="animable" style="transform-origin: 210.808px 319.314px;">
            <g id="freepik--Cat--inject-18" class="animable" style="transform-origin: 210.808px 319.314px;">
                <g id="freepik--Yarn--inject-18" class="animable" style="transform-origin: 292.664px 409.761px;">
                    <path
                        d="M309.71,429.76A98.94,98.94,0,0,1,280.64,425l-1.19-.39c-16.45.47-35.38-2.67-49.2-7.82l1.14-3.06c11.37,4.23,26.75,7.09,41,7.55-5.34-3.52-6-7.37-5.69-9.73.71-6.27,8.72-11.61,18.65-12.45,9.22-.76,22.6,1.6,27,7.07a33.38,33.38,0,0,1,13.14,5.8c3.58,2.75,5.44,5.85,5.24,8.73a6.47,6.47,0,0,1-.24,1.33c3.86,0,8,.17,12.48-.73,5.74-1.15,8.95-3.61,8.84-5.74-.38-7.14-26.57-19.64-50.52-21.84-31.9-2.94-54,3.89-63.31,10.63l-1.92-2.64c9.72-7.07,32.73-14.26,65.53-11.24,22.88,2.1,52.93,14.56,53.48,24.92.22,4.09-3.63,7.54-11.45,9.12-5.41,1.08-10.54.89-15.26.75a9.69,9.69,0,0,1-1.07.83C323.7,428.55,317.33,429.76,309.71,429.76Zm-20.83-5.85c13.16,3.11,26.49,3.48,33.71.9a46.82,46.82,0,0,1-17.36-5.5l-.51.26A50.87,50.87,0,0,1,288.88,423.91Zm19.71-6.55a47.42,47.42,0,0,0,18.4,4.58,3.15,3.15,0,0,0,.5-1.46c.12-1.72-1.33-3.88-4-5.91a29.6,29.6,0,0,0-9.7-4.68C313.9,412.46,312.15,415,308.59,417.36Zm-19.47-15.13c-1.17,0-2.33,0-3.47.14-8.26.69-15.15,4.89-15.67,9.55-.4,3.54,3.18,6.91,9.89,9.38,8.61-.27,16.43-1.55,22.21-4.1-2.34-1.85-3.83-3.78-4.31-5.54-.63-2.34.51-4.32,3-5.17a18,18,0,0,1,5.42-.91C302,403.59,295.49,402.23,289.12,402.23Zm17.64,6.6a15.16,15.16,0,0,0-4.95.75c-1.11.38-1,.83-.88,1.22.34,1.26,1.87,3,4.45,4.71,3.74-2.19,5.57-4.37,5.08-6.11a1.43,1.43,0,0,0-.09-.27A23.65,23.65,0,0,0,306.76,408.83Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 292.664px 409.761px; --darkreader-inline-fill: #b3aca2;"
                        id="elbcjief3hrc9" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M319.12,425.73a68.34,68.34,0,0,0,6.78,1.2,12.76,12.76,0,0,0,1.41-.83,9.69,9.69,0,0,0,1.07-.83s-3.2-.16-5.79-.46A24.55,24.55,0,0,1,319.12,425.73Z"
                        style="fill: rgb(55, 71, 79); transform-origin: 323.75px 425.87px; --darkreader-inline-fill: #beb8b0;"
                        id="elq5wuygaci6l" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M302.82,420.43c.65-.27,1.29-.56,1.9-.86l.51-.26a20.91,20.91,0,0,1-3.15-2.11c-.77.34-1.59.65-2.43.95A13.06,13.06,0,0,0,302.82,420.43Z"
                        style="fill: rgb(55, 71, 79); transform-origin: 302.44px 418.815px; --darkreader-inline-fill: #beb8b0;"
                        id="ell1r2br92e1m" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M310.46,409.4a2.49,2.49,0,0,1-.24,1.8,13.53,13.53,0,0,1,3.22.82,5.45,5.45,0,0,0,.38-2.13,16.47,16.47,0,0,0-3.45-.76A1.43,1.43,0,0,1,310.46,409.4Z"
                        style="fill: rgb(55, 71, 79); transform-origin: 312.021px 410.575px; --darkreader-inline-fill: #beb8b0;"
                        id="elat246c2juve" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M268.46,421.09a24.29,24.29,0,0,0,5,3.54q3,.06,6,0a49.41,49.41,0,0,1-7-3.33C271.11,421.24,269.79,421.18,268.46,421.09Z"
                        style="fill: rgb(55, 71, 79); transform-origin: 273.96px 422.875px; --darkreader-inline-fill: #beb8b0;"
                        id="elqcn54uqb84" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M236.08,401.72l1.92,2.64c3.66-2.66,9.33-5.33,16.81-7.41a25.44,25.44,0,0,0,.84-3.57C246.87,395.64,240.25,398.69,236.08,401.72Z"
                        style="fill: rgb(55, 71, 79); transform-origin: 245.865px 398.87px; --darkreader-inline-fill: #beb8b0;"
                        id="elc7q5vxsz8fv" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M241.25,416.81c-3.5-.92-6.83-1.94-9.86-3.07l-1.14,3.06c2.46.92,5.09,1.76,7.83,2.54C239.17,418.55,240.23,417.7,241.25,416.81Z"
                        style="fill: rgb(55, 71, 79); transform-origin: 235.75px 416.54px; --darkreader-inline-fill: #beb8b0;"
                        id="elb82p6aicgm" class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="freepik--cat--inject-18" class="animable" style="transform-origin: 179.121px 319.314px;">
                    <path
                        d="M178,278.37h-.07c-12.42-.47-24.18-9.7-35.55-18.62-9.72-7.63-18.91-14.84-26.76-14.84a1.63,1.63,0,0,1,0-3.26c9,0,18.6,7.54,28.78,15.53,11,8.6,22.29,17.49,33.66,17.92a1.64,1.64,0,0,1-.06,3.27Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 146.768px 260.01px; --darkreader-inline-fill: #b3aca2;"
                        id="elymdxv70x6l" class="animable" data-darkreader-inline-fill=""></path>
                    <g id="freepik--Tail--inject-18" class="animable" style="transform-origin: 103.634px 277.77px;">
                        <path
                            d="M97.27,350.05c-8.84-3.28-16.4-15.37-13.11-28.83,4-16.22,21.77-27.71,31.54-37.12,18.16-17.49,29.28-31.47,23.49-56.63-5.07-22-25.46-29.36-37.58-28.91-15,.57-24.48,6.83-23.65,11.7.37,2.16,4.46,3.12,7.69,4.31,10,3.66,13.12,5.9,16.32,10.21,4.87,6.56,5.69,15.13,4.64,15.72s-2.44-4.34-9.09-7.18-9.9-.79-9.84.69,6.18,2.88,8,11.68c1.54,7.32,1.17,16.75-9.84,31.82-6.78,9.28-22.19,26.65-18.83,48.82S87.25,356.6,94.2,357Z"
                            style="fill: rgb(186, 104, 200); transform-origin: 103.634px 277.77px; --darkreader-inline-fill: #be70cb;"
                            id="el1s8imz0b2w9" class="animable" data-darkreader-inline-fill=""></path>
                        <g id="el030de8t9ws1j">
                            <path
                                d="M97.27,350.05c-8.84-3.28-16.4-15.37-13.11-28.83,4-16.22,21.77-27.71,31.54-37.12,18.16-17.49,29.28-31.47,23.49-56.63-5.07-22-25.46-29.36-37.58-28.91-15,.57-24.48,6.83-23.65,11.7.37,2.16,4.46,3.12,7.69,4.31,10,3.66,13.12,5.9,16.32,10.21,4.87,6.56,5.69,15.13,4.64,15.72s-2.44-4.34-9.09-7.18-9.9-.79-9.84.69,6.18,2.88,8,11.68c1.54,7.32,1.17,16.75-9.84,31.82-6.78,9.28-22.19,26.65-18.83,48.82S87.25,356.6,94.2,357Z"
                                style="opacity: 0.05; transform-origin: 103.634px 277.77px;" class="animable"></path>
                        </g>
                        <g id="el3hvh7kv6g2r">
                            <path
                                d="M94.2,357l3.07-6.94a18.79,18.79,0,0,1-6.76-4.51,47.87,47.87,0,0,0-3.09,9.57A20.16,20.16,0,0,0,94.2,357Z"
                                style="opacity: 0.15; transform-origin: 92.345px 351.275px;" class="animable"></path>
                        </g>
                        <path
                            d="M123,224.4c1.35-.89.87-3,.2-4.42A32.51,32.51,0,0,0,116,209.83a49.49,49.49,0,0,1,6.5,1.84c3.08,1,5.07,2.31,5.53,1.17a5.79,5.79,0,0,0-.12-2.61c-.54-2.12-1.06-2.89-1.79-3.46a39.49,39.49,0,0,0-24.55-8.21c-15,.57-24.48,6.83-23.65,11.7.37,2.16,4.46,3.12,7.69,4.31,10,3.66,13.12,5.9,16.32,10.21,0,.06,3.62,1.79,5.25,2.83a5.66,5.66,0,0,0,2.39,1,1.75,1.75,0,0,0,1.13-.27c1.12-.74.88-2.42.47-3.69a51,51,0,0,0-3-7.25,23.3,23.3,0,0,1,10.44,5.45C119.86,224,121.57,225.3,123,224.4Z"
                            style="fill: rgb(69, 90, 100); transform-origin: 102.997px 213.588px; --darkreader-inline-fill: #b3aca2;"
                            id="eluvmzgslbn5b" class="animable" data-darkreader-inline-fill=""></path>
                    </g>
                    <g id="freepik--Paw--inject-18" class="animable" style="transform-origin: 222.145px 368.65px;">
                        <path
                            d="M171.67,344.22c1.27,17.38,7,28.2,18.82,38.24s28.69,16,36.14,19.28,13,7.2,18.36,2.64,4.92-14.43,14.47-22.27,12.9-10,13.15-15.72c.32-7.51-6.91-7.32-9.12-6.19,0,0-1.87-3.2-7.2-2a10.8,10.8,0,0,0-6.61,4.78s-3.32-.2-6.83,3.08c-3.11,2.9-9.16,10.69-9.16,10.69s6.46-10.15,3.64-21c-2.55-9.82-8.83-12.5-8.83-12.5s2.7-1.38,9.92-.09c0,0-3-8.38-16.18-11.63s-21.89,6.18-21.89,6.18Z"
                            style="fill: rgb(186, 104, 200); transform-origin: 222.145px 368.65px; --darkreader-inline-fill: #be70cb;"
                            id="elpym3ujw7r6h" class="animable" data-darkreader-inline-fill=""></path>
                        <g id="elljdmsdut39h">
                            <path
                                d="M252,360.29h0a11,11,0,0,0-2.36,2.67c2,0,6.19.21,7.66,5.31C257.34,368.27,259,362.52,252,360.29Z"
                                style="opacity: 0.15; transform-origin: 253.57px 364.28px;" class="animable"></path>
                        </g>
                        <g id="elipf8ov6tufr">
                            <path
                                d="M264.74,366.18s2.71-1.53,1.14-6.55a6.59,6.59,0,0,0-2.39.57A6.72,6.72,0,0,1,264.74,366.18Z"
                                style="opacity: 0.15; transform-origin: 264.93px 362.905px;" class="animable"></path>
                        </g>
                        <path
                            d="M256.26,375.87a21.26,21.26,0,0,0-14.88,13c-3,7.13-1.93,11.9,1,12.63s4.3.32,6.83-3.53c2.1-4.79,4.08-10.73,10.29-15.83l4.84-3.95C264,376.09,261.26,374.64,256.26,375.87Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 251.965px 388.608px; --darkreader-inline-fill: #f18383;"
                            id="eldmxzivnreq5" class="animable" data-darkreader-inline-fill=""></path>
                        <path d="M254.74,369.07c-2-.79-4,3.84-1.74,4.72C254.87,374.52,257.35,370.13,254.74,369.07Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 253.934px 371.426px; --darkreader-inline-fill: #ff908e;"
                            id="elw1o2jz9ca1f" class="animable" data-darkreader-inline-fill=""></path>
                        <path d="M262.4,367.5c-1.95-.79-4,3.84-1.74,4.72C262.53,373,265,368.56,262.4,367.5Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 261.597px 369.861px; --darkreader-inline-fill: #f18383;"
                            id="el7syofl4mwcn" class="animable" data-darkreader-inline-fill=""></path>
                        <path d="M268.69,367.34c-1.95-.8-4,3.83-1.74,4.71C268.83,372.78,271.31,368.4,268.69,367.34Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 267.893px 369.69px; --darkreader-inline-fill: #f18383;"
                            id="elljx4g11zzqr" class="animable" data-darkreader-inline-fill=""></path>
                    </g>
                    <g id="freepik--Body--inject-18" class="animable" style="transform-origin: 155.292px 355.079px;">
                        <path
                            d="M151.07,299.58c-1,5.55-21.89,10.83-36.23,21.64s-27,25.55-24.75,51.1c2.47,28,27.71,38.33,41,38.33s58.67-3.52,81.9-36.57S204.93,297.51,151.07,299.58Z"
                            style="fill: rgb(186, 104, 200); transform-origin: 155.292px 355.079px; --darkreader-inline-fill: #be70cb;"
                            id="elgwkw59rhw2u" class="animable" data-darkreader-inline-fill=""></path>
                        <g id="elaqs5i743z2p">
                            <path
                                d="M118.39,364.31s7.23-12.75,27.08-9.23,18.07,34.27,18.07,34.27.22,17.19-12.47,15.39S118.39,364.31,118.39,364.31Z"
                                style="opacity: 0.15; transform-origin: 140.986px 379.669px;" class="animable"></path>
                        </g>
                        <g id="el74f2mbexf04">
                            <path
                                d="M151.07,299.58a3.78,3.78,0,0,1-.92,1.72c-.85,10.24,2.31,23.44,14,27.07,12.71,4,27.06,1.68,36.69-1.71a70.17,70.17,0,0,0,9.23-4.06C198.25,308.41,177.35,298.57,151.07,299.58Z"
                                style="opacity: 0.15; transform-origin: 180.045px 314.995px;" class="animable"></path>
                        </g>
                    </g>
                    <path
                        d="M159.08,372.19l-.35,0c-44-9.45-60.2-37.22-66-52.94-7.5-20.44-8.15-42.83-1.62-55.71A1.63,1.63,0,1,1,94.06,265c-6.14,12.12-5.43,33.46,1.78,53.11,5.53,15.08,21.15,41.74,63.58,50.86a1.63,1.63,0,0,1-.34,3.23Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 123.682px 317.411px; --darkreader-inline-fill: #b3aca2;"
                        id="elx7suuo44so" class="animable" data-darkreader-inline-fill=""></path>
                    <g id="freepik--yarn--inject-18" class="animable" style="transform-origin: 221.957px 372.563px;">
                        <path
                            d="M256.53,361.25c5.06,29.3-14,57.06-42.59,62s-55.87-14.8-60.94-44.1c-4.26-24.66,9.1-45.21,30.49-54a61.87,61.87,0,0,1,19.73-4.49C229.07,319.07,251.87,334.32,256.53,361.25Z"
                            style="fill: rgb(69, 90, 100); transform-origin: 204.777px 372.277px; --darkreader-inline-fill: #b3aca2;"
                            id="elkotezb9bs3i" class="animable" data-darkreader-inline-fill=""></path>
                        <g style="clip-path: url(&quot;#freepik--clip-path--inject-18&quot;); transform-origin: 222.181px 372.563px;"
                            id="el2vodfj808em" class="animable">
                            <g id="elm3jv3n29l3">
                                <path
                                    d="M290.38,369.62a113.15,113.15,0,0,1-38.3,6.05,68.11,68.11,0,0,0,7.64-3.62c5.61-3,12.62-6.36,14.15-13,.3-1.24-1.22-1-1.81-.51-4.38,3.61-9.65,8.2-15.37,11.7a29.17,29.17,0,0,1-21.42,3.42c-1.51-.33-3-.7-4.54-1.11a49.29,49.29,0,0,0,14.79-5.48c10.65-6.07,16.12-14.59,18-26.46.22-1.34-1.15-1.78-2-.91-1.64,1.63-1.94,3.36-2.69,5.58-2.41,7-5.76,11.06-11.73,15.44a41.36,41.36,0,0,1-14,6.58c-2.56.64-5.21.75-7.8,1.15a14.53,14.53,0,0,1-7.92-.76,49.77,49.77,0,0,1-5.69-3.12c11.21-.66,23.73-10.57,30.93-17.28,7.62-7.11,13.13-16,11.9-26.56-.21-1.89-2.39-.75-2.65.53-1,4.93-1.45,8.17-3.75,12.87a36.61,36.61,0,0,1-9.54,11.79c-8.28,7.17-19.68,14.89-30.93,15.92-1.57-1.16-3.13-2.37-4.61-3.66,8.43-3.15,15.63-9.44,21.52-16.24a41.57,41.57,0,0,0,8.1-13.52c1.13-3.18,3.65-8.43,2.32-11.76-.63-1.56-2.56-.08-2.67,1-.79,8.11-5.44,16-10.61,22.21-2.46-6.84-4.17-12.85-3.7-20.41a87,87,0,0,1,1.49-10.64c.22-1.13.59-2.24,0-3.29-.81-1.51-2.71.84-2.43,1.94-.07-.28-1,1.17-1.09,1.27-.85,1.48-.77,3.7-1,5.36a58,58,0,0,0-.85,8.42c-.18,7.44,1.88,13.84,4.75,20.55a66.76,66.76,0,0,1-8.74,7c-1.89-1.4-3.21-5-4.27-6.93a65.3,65.3,0,0,1-4.52-8.71c-2.77-7.21-2.11-15.73-5.13-22.57-.35-.8-1.82.12-1.85.75-.26,9.38,1.29,19.06,5.4,27.6,1.6,3.34,3.92,9.14,6.92,12.37a11.32,11.32,0,0,1-2.46,1.4,9.3,9.3,0,0,1-2.92.83c-2.38.16-3.71-2-5.13-3.57a68.37,68.37,0,0,1-4.65-5.81,57.7,57.7,0,0,1-8.17-16.06c-1.46-4.79-1.12-10.31-3.42-14.83-1.11-2.18-3.79.07-3.18,1.95,1.61,5,.74,10.47,2.29,15.58A65.72,65.72,0,0,0,188.82,351a73.61,73.61,0,0,0,25.79,21.7c14,6.86,31.93,10.83,48.62,9.2a96.32,96.32,0,0,1-54-5.31c-19.5-7.87-39-25.51-44.08-46.56-.21-.8-1.64-.36-1.7.34-1,10.41,7,21.43,13.83,28.54,7.82,8.1,16.12,15.75,26.61,20.34,11.41,5,22.85,8.33,35.4,8.56a149.08,149.08,0,0,0,15.17-.32,69.64,69.64,0,0,1-19.42,3.58c-8.57.11-17.08-1.41-25.4-3.32-13.52-3.11-24.82-8.66-35.05-18.14a80.47,80.47,0,0,1-10.92-13.08c-3.1-4.43-7.66-9.52-8.82-14.87-.26-1.21-2.27.12-2.19,1,.32,4.41,2.41,8.6,4.68,12.32,1.27,2.1,2.73,4.05,4.16,6a11.45,11.45,0,0,1,2.58,6.16c.08,1.92-.62,3.52-.9,5.36s-.61,3.37-.9,5.06a65.86,65.86,0,0,0-.85,10.59c-.1,11.42,5.35,21.31,11.51,30.53.64,1,2.29-.57,2-1.45-3.38-10.63-9.88-19.05-9.27-30.75.31-5.82,2-11.19,3.33-16.74.11.12.23.26.34.36,1.94,2,4,4,6.1,5.81,1.7,1.46,3.62,3.11,3.37,5.58a29.48,29.48,0,0,1-1.41,4.87,38.5,38.5,0,0,0-1,5.54c-.4,3.21-.53,6.45-.77,9.67-.75,10.48,2,23.91,9.58,31.74a1.08,1.08,0,0,0,1.37,0,22.53,22.53,0,0,0,4.34,6.51.92.92,0,0,0,1.5-1,56.65,56.65,0,0,1-3.69-24.09c7.25,3.26,17.55,2.73,24.47.58a53,53,0,0,0,15-7,45.55,45.55,0,0,0,12.89-12.72c8.84-.73,16.2-3.47,23.94-8.09a2.38,2.38,0,0,0,.91-2.12,38.51,38.51,0,0,0,5.6-2.14,2.46,2.46,0,0,0,.85-2.94,53.78,53.78,0,0,0,18.45-8.06C291.88,371.6,292.26,369,290.38,369.62ZM193,397.53c.41-.91.85-1.83,1.32-2.72a49.41,49.41,0,0,1,3.14-5.29,2.06,2.06,0,0,0,.17-.33q2.81,1,5.74,1.86c4,1.1,8.15,2.06,12.38,2.81-.35,0-1.58,1.15-1.87,1.36-.66.47-1.34.94-2,1.37a28.78,28.78,0,0,1-4.17,2.23,22,22,0,0,1-8.77,2,16.85,16.85,0,0,1-4.4-.82C193.37,399.66,192.45,398.82,193,397.53ZM184.24,412a54.61,54.61,0,0,0,0,12.65c-2.72-7.39-4.6-14.86-4.1-22.95a88.83,88.83,0,0,1,3.44-19.58c0,.32,4.08,2.45,4.5,2.69,1.1.61,3.95,1.43,4.39,2.73a1.27,1.27,0,0,1,0,.77,5.41,5.41,0,0,1-.83,1.62C187.16,396.62,185.09,404,184.24,412Zm43.51-8.57a46.77,46.77,0,0,1-13.07,6.66c-7.23,2.43-17.94,3.54-25.38,0a50,50,0,0,1,1.44-6.45c3.67,1.76,9.23,1.58,12.54,1,6-1.11,14.09-4.48,17.42-9.95a98.29,98.29,0,0,0,16.16.88A58.25,58.25,0,0,1,227.75,403.43Z"
                                    style="opacity: 0.15; transform-origin: 222.181px 372.563px;" class="animable">
                                </path>
                            </g>
                        </g>
                    </g>
                    <g id="el904cc0dti68">
                        <g style="opacity: 0.15; transform-origin: 174.982px 388.795px;" class="animable">
                            <path
                                d="M163.33,381.82c-4.43-12.52-10.84-11.63-10.84-11.63s2.63-1.52,9.9-.61c0,0-2-5.46-9.3-8.71a50.7,50.7,0,0,0-.09,18.28,54.84,54.84,0,0,0,8.29,20.93C163.27,396,165.81,388.83,163.33,381.82Z"
                                id="el8dns4jeyrww" class="animable" style="transform-origin: 158.286px 380.475px;">
                            </path>
                            <path
                                d="M178.74,416.72a27.88,27.88,0,0,1,6.72-9.35c9.12-8.33,12.35-10.7,12.29-16.39-.07-7.52-7.28-7-9.43-5.71,0,0-2-3.1-7.29-1.63a10.79,10.79,0,0,0-6.35,5.12s-3.57-.37-7.28,3.61a77,77,0,0,0-6,7.94A53.83,53.83,0,0,0,178.74,416.72Z"
                                id="eldspqvrx8vlc" class="animable" style="transform-origin: 179.575px 399.982px;">
                            </path>
                        </g>
                    </g>
                    <g id="freepik--paw--inject-18" class="animable" style="transform-origin: 229.339px 327.766px;">
                        <path
                            d="M254.62,339.1c-.18-4.44-2.87-10.41-6.35-15.33-5.8-8.2-14.15-13.28-22.57-16L204,321.27c23.14-.78,31.11,11.4,33.25,18.2,1.48,4.7,2.73,8.32,5.47,8.32a2.78,2.78,0,0,0,3-2.34c1.89,1.8,4.72.73,4.84-1.58a2.44,2.44,0,0,0,2.91-.52A5.54,5.54,0,0,0,254.62,339.1Z"
                            style="fill: rgb(186, 104, 200); transform-origin: 229.339px 327.786px; --darkreader-inline-fill: #be70cb;"
                            id="elk7aegs6i77e" class="animable" data-darkreader-inline-fill=""></path>
                        <g id="eljv3e5diiib">
                            <path
                                d="M225.7,307.73,204,321.27a54.81,54.81,0,0,1,8.18.3,62.43,62.43,0,0,0,16.63-12.7Q227.28,308.24,225.7,307.73Z"
                                style="opacity: 0.15; transform-origin: 216.405px 314.65px;" class="animable"></path>
                        </g>
                        <g id="elrf3gm712o1a">
                            <path
                                d="M253.48,343.35a.1.1,0,0,0,0-.05,1.7,1.7,0,0,1-2.21-1.2c-.74-1.77-1-2.6-1.36-3a14.75,14.75,0,0,1,.62,4.77A2.44,2.44,0,0,0,253.48,343.35Z"
                                style="opacity: 0.15; transform-origin: 251.697px 341.627px;" class="animable"></path>
                        </g>
                        <g id="ellfwxwcpqbd">
                            <path
                                d="M248.91,346.16a2.63,2.63,0,0,1-2.35-2.17c-.56-1.86-.89-2.44-1.29-2.84a12.78,12.78,0,0,1,.46,4.3A3,3,0,0,0,248.91,346.16Z"
                                style="opacity: 0.15; transform-origin: 247.09px 343.748px;" class="animable"></path>
                        </g>
                    </g>
                    <g id="freepik--paw--inject-18" class="animable" style="transform-origin: 140.945px 382.45px;">
                        <path
                            d="M90.09,372.32c2.18,17.29,8.44,27.79,20.81,37.2S140.4,424,148,426.87s13.35,6.5,18.48,1.67,4.15-14.67,13.28-23,12.35-10.7,12.3-16.39c-.08-7.52-7.28-6.95-9.44-5.71,0,0-2-3.1-7.29-1.63a10.83,10.83,0,0,0-6.35,5.12s-3.57-.37-7.28,3.61c-2.9,3.11-8,11-8,11s7.62-11,3.89-21.53c-4.43-12.52-10.84-11.63-10.84-11.63s2.63-1.52,9.91-.61c0,0-3.37-9-16.77-10.76a26,26,0,0,0-21.54,7.32Z"
                            style="fill: rgb(186, 104, 200); transform-origin: 141.075px 393.852px; --darkreader-inline-fill: #be70cb;"
                            id="elh7hlr0gb939" class="animable" data-darkreader-inline-fill=""></path>
                        <g id="elw8aofziyyw">
                            <path
                                d="M171.2,384.14h0a10.59,10.59,0,0,0-2.22,2.79c2.87-.05,6.35.2,8.13,5.37C177.11,392.3,179.35,386.47,171.2,384.14Z"
                                style="opacity: 0.15; transform-origin: 173.186px 388.22px;" class="animable"></path>
                        </g>
                        <g id="elwzv8fjomjsp">
                            <path
                                d="M184.18,389.35s2.63-1.67.8-6.6a6.63,6.63,0,0,0-2.36.69A6.69,6.69,0,0,1,184.18,389.35Z"
                                style="opacity: 0.15; transform-origin: 184.124px 386.05px;" class="animable"></path>
                        </g>
                        <path
                            d="M176.23,399.47a21.28,21.28,0,0,0-14.17,13.73c-2.62,7.29-1.31,12,1.62,12.57s4.31.1,6.64-3.88c1.84-4.9,3.51-10.94,9.44-16.35,1.75-1.6,3.29-3,4.62-4.21C184,399.28,181.16,398,176.23,399.47Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 172.514px 412.402px; --darkreader-inline-fill: #f18383;"
                            id="el5w66yuhavzs" class="animable" data-darkreader-inline-fill=""></path>
                        <path d="M173.86,393.26c-2-.69-3.79,4-1.49,4.8C174.28,398.69,176.53,394.18,173.86,393.26Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 173.187px 395.656px; --darkreader-inline-fill: #f18383;"
                            id="elxwkjkyf789r" class="animable" data-darkreader-inline-fill=""></path>
                        <path d="M181.92,390.79c-2-.69-3.79,4-1.49,4.81C182.34,396.23,184.59,391.71,181.92,390.79Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 181.247px 393.19px; --darkreader-inline-fill: #f18383;"
                            id="eld3qc8xmhn5l" class="animable" data-darkreader-inline-fill=""></path>
                        <path d="M188.2,390.3c-2-.69-3.8,4-1.49,4.8C188.62,395.73,190.86,391.22,188.2,390.3Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 187.523px 392.696px; --darkreader-inline-fill: #f18383;"
                            id="elutt64tyj5s" class="animable" data-darkreader-inline-fill=""></path>
                        <g id="ely8vptuj8ss9">
                            <path
                                d="M160.65,428.54c-11.87-2.56-10.28-9-15.59-12.78s-17.14-2.37-36.11-17.89S89.1,348.67,101.22,334c-7.65,9.41-12.61,21.54-11.13,38.33a45.2,45.2,0,0,0,1.41,7.91c3,12.76,9,21.41,19.4,29.29,12.38,9.4,29.5,14.51,37.1,17.35s13.35,6.5,18.48,1.67a9.69,9.69,0,0,0,1.12-1.28A8.88,8.88,0,0,1,160.65,428.54Z"
                                style="opacity: 0.05; transform-origin: 128.714px 382.45px;" class="animable"></path>
                        </g>
                    </g>
                    <g id="elqz0ivls7aeh">
                        <path
                            d="M205.4,345.41c-6.19-8.51-11.06-12.49-18.57-16.69v-4.87c-1.13.39-2.25.81-3.34,1.26a51.08,51.08,0,0,0-24.91,21.16c22.86-1.72,33.15,9.94,35.7,16.65,1.79,4.71,3.28,8.33,6.08,8.17a2.85,2.85,0,0,0,2.89-2.57c2,1.72,4.87.47,4.85-1.89a2.5,2.5,0,0,0,2.94-.71,5.67,5.67,0,0,0,.91-4.41C211.5,357,209,350.39,205.4,345.41Z"
                            style="opacity: 0.15; transform-origin: 185.324px 347.473px;" class="animable"></path>
                    </g>
                    <g id="freepik--paw--inject-18" class="animable" style="transform-origin: 186.578px 343.623px;">
                        <path
                            d="M212.9,358.16c-.44-4.52-2.92-11.13-6.54-16.1-6.2-8.51-11.06-12.49-18.58-16.69v-5.92S160.69,325,160.19,343c23.59-2.17,32.45,9.8,35,16.62,1.79,4.71,3.28,8.33,6.08,8.17a2.85,2.85,0,0,0,2.89-2.57c2,1.72,4.87.47,4.85-1.89a2.5,2.5,0,0,0,2.94-.71C213,361.35,213.06,359.76,212.9,358.16Z"
                            style="fill: rgb(186, 104, 200); transform-origin: 186.578px 343.623px; --darkreader-inline-fill: #be70cb;"
                            id="eli9j63ejjbi" class="animable" data-darkreader-inline-fill=""></path>
                        <g id="elkm0j5q3uy5n">
                            <path
                                d="M212,362.57l0-.05a1.74,1.74,0,0,1-2.33-1.1c-.86-1.76-1.14-2.6-1.57-3a14.86,14.86,0,0,1,.92,4.84A2.5,2.5,0,0,0,212,362.57Z"
                                style="opacity: 0.15; transform-origin: 210.05px 360.954px;" class="animable"></path>
                        </g>
                        <g id="el8ouqqsa2i67">
                            <path
                                d="M207.49,365.71a2.7,2.7,0,0,1-2.53-2.08c-.68-1.87-1.06-2.44-1.49-2.82a13.15,13.15,0,0,1,.73,4.36A3.08,3.08,0,0,0,207.49,365.71Z"
                                style="opacity: 0.15; transform-origin: 205.48px 363.387px;" class="animable"></path>
                        </g>
                        <g id="elgxgy8yqytsn">
                            <path
                                d="M167.22,329.19c8.86,2.05,18.23,1.38,26.11-.39-1.71-1.19-3.53-2.3-5.55-3.43v-5.92S175.4,322,167.22,329.19Z"
                                style="opacity: 0.15; transform-origin: 180.275px 324.952px;" class="animable"></path>
                        </g>
                    </g>
                    <path
                        d="M193.62,260.23c2.73-8.65,14.67-19.56,24.73-16.39,5.66,1.78,3.39,22.67,3.39,22.67S203.35,267.92,193.62,260.23Z"
                        style="fill: rgb(186, 104, 200); transform-origin: 207.905px 254.945px; --darkreader-inline-fill: #be70cb;"
                        id="el3ia5gnxwoom" class="animable" data-darkreader-inline-fill=""></path>
                    <g id="elyvmwbg7tc5">
                        <path
                            d="M193.62,260.23c2.73-8.65,14.67-19.56,24.73-16.39,5.66,1.78,3.39,22.67,3.39,22.67S203.35,267.92,193.62,260.23Z"
                            style="opacity: 0.15; transform-origin: 207.905px 254.945px;" class="animable"></path>
                    </g>
                    <path
                        d="M202.17,264.47c9.26,2.83,19.57,2,19.57,2s2.27-20.89-3.39-22.67C214.68,243.3,205.78,248.89,202.17,264.47Z"
                        style="fill: rgb(255, 168, 167); transform-origin: 212.18px 255.176px; --darkreader-inline-fill: #ff908e;"
                        id="el5i4hylh3jmx" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M214.06,256.78c-.86-2.32.8-5.31.8-5.31-3.39,0-7.81,3.48-8.22,9.09,0,0,6.91,8.32,14,3.91a9.26,9.26,0,0,1,1.48-3.31c.06-1.44.1-3.06.07-4.73A20.23,20.23,0,0,0,214.06,256.78Z"
                        style="fill: rgb(242, 143, 143); transform-origin: 214.42px 258.615px; --darkreader-inline-fill: #f18383;"
                        id="elsvgb7nfu06" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M170.17,268.47c-7.53-5-23.67-6.11-29.55,2.65-3.31,4.93,11.54,19.84,11.54,19.84S167.37,280.55,170.17,268.47Z"
                        style="fill: rgb(186, 104, 200); transform-origin: 155.154px 277.789px; --darkreader-inline-fill: #be70cb;"
                        id="elhsb3vf77hej" class="animable" data-darkreader-inline-fill=""></path>
                    <g id="elor9ueh7yy0l">
                        <path
                            d="M170.17,268.47c-7.53-5-23.67-6.11-29.55,2.65-3.31,4.93,11.54,19.84,11.54,19.84S167.37,280.55,170.17,268.47Z"
                            style="opacity: 0.15; transform-origin: 155.154px 277.789px;" class="animable"></path>
                    </g>
                    <path
                        d="M166.14,277.12c-5.47,8-14,13.84-14,13.84s-14.85-14.91-11.54-19.84C143.15,268.4,153.59,267.21,166.14,277.12Z"
                        style="fill: rgb(255, 168, 167); transform-origin: 153.129px 280.081px; --darkreader-inline-fill: #ff908e;"
                        id="elold3vh39wk" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M148.52,274.62s3.17,1.3,3.95,3.65c0,0-4.6,2-6.87,5.2.85,1.1,1.72,2.14,2.53,3.09a8.94,8.94,0,0,1,4,1.84c8.29-1,8-11.22,8-11.22C157.21,273,151.17,272.5,148.52,274.62Z"
                        style="fill: rgb(242, 143, 143); transform-origin: 152.866px 280.898px; --darkreader-inline-fill: #f18383;"
                        id="el0c73kl68os0c" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M201.89,322.07c-9.63,3.39-24,5.67-36.69,1.72-15.15-4.72-16-25.52-12.3-35.1s11.25-19.34,28.58-25.45,29.35-3.24,38.22,1.92,21.26,21.89,12.41,35.06C224.68,311.26,211.52,318.68,201.89,322.07Z"
                        style="fill: rgb(186, 104, 200); transform-origin: 193.108px 292.833px; --darkreader-inline-fill: #be70cb;"
                        id="elfzpzpzqf8ci" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M201.81,319.9c19.19-6.77,18.19-18,13.34-22.52s-12.89-5.5-22.07-2.27-14.82,9.06-15.78,15.6S182.61,326.66,201.81,319.9Z"
                        style="fill: rgb(240, 240, 240); transform-origin: 197.667px 307.724px; --darkreader-inline-fill: #dfdcd7;"
                        id="el7ra1omj0r0n" class="animable" data-darkreader-inline-fill=""></path>
                    <path d="M196.56,311.86s.78,3.25,3.2,2.44,1-3.88,1-3.88l-3-2.18Z"
                        style="fill: rgb(242, 143, 143); transform-origin: 198.867px 311.335px; --darkreader-inline-fill: #f18383;"
                        id="elgqn2xpmhk6j" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M196.44,304.69l-4.51-.5a.62.62,0,0,1,.14-1.24l3.93.44,2.85-2.77a.62.62,0,0,1,.88,0,.63.63,0,0,1,0,.88Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 195.643px 302.563px; --darkreader-inline-fill: #b3aca2;"
                        id="elrln8552h6v" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M193.18,314a5.12,5.12,0,0,1-4.82-3.41.62.62,0,0,1,1.18-.41,3.86,3.86,0,0,0,7.29-2.57l-1.19-3.38a.62.62,0,1,1,1.17-.41l1.19,3.38a5.1,5.1,0,0,1-3.12,6.51A5,5,0,0,1,193.18,314Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 193.309px 308.697px; --darkreader-inline-fill: #b3aca2;"
                        id="elgcptwf6c4dw" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M201.64,311a5.16,5.16,0,0,1-2.2-.5,5.06,5.06,0,0,1-2.61-2.91l-1.19-3.38a.62.62,0,1,1,1.17-.41l1.19,3.38a3.84,3.84,0,0,0,2,2.2,3.87,3.87,0,0,0,5.32-4.77.62.62,0,0,1,.38-.79.61.61,0,0,1,.79.38,5.11,5.11,0,0,1-3.12,6.51A5,5,0,0,1,201.64,311Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 201.19px 307.187px; --darkreader-inline-fill: #b3aca2;"
                        id="eld264g20nms" class="animable" data-darkreader-inline-fill=""></path>
                    <path d="M215.06,285.08a4.48,4.48,0,1,1-5.71-2.74A4.48,4.48,0,0,1,215.06,285.08Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 210.834px 286.567px; --darkreader-inline-fill: #b3aca2;"
                        id="el9eaz6y2jehp" class="animable" data-darkreader-inline-fill=""></path>
                    <path d="M169.66,301.07a4.47,4.47,0,1,0,2.73-5.71A4.48,4.48,0,0,0,169.66,301.07Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 173.875px 299.577px; --darkreader-inline-fill: #b3aca2;"
                        id="elatu8aywb8vm" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M156.61,301.83a.93.93,0,0,1-.66-.27c-3.42-3.49-9.19-7.07-17.24-4.26a.93.93,0,0,1-.62-1.76c9-3.12,15.39.84,19.19,4.71a.93.93,0,0,1,0,1.32A.9.9,0,0,1,156.61,301.83Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 147.511px 298.123px; --darkreader-inline-fill: #b3aca2;"
                        id="elwrkesbrimyd" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M154.54,304.15a.87.87,0,0,1-.49-.14c-3.09-1.9-8.71-1.91-11.66-.64a.93.93,0,0,1-1.23-.48,1,1,0,0,1,.49-1.23c3.38-1.45,9.71-1.5,13.38.77a.93.93,0,0,1,.3,1.28A.91.91,0,0,1,154.54,304.15Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 148.285px 302.393px; --darkreader-inline-fill: #b3aca2;"
                        id="elrhpmyypz6yb" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M140.12,312a.94.94,0,0,1-.6-1.65c5.53-4.66,12.69-5.52,17-4.35a.93.93,0,0,1-.49,1.79c-3.86-1-10.29-.24-15.31,4A.91.91,0,0,1,140.12,312Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 148.171px 308.765px; --darkreader-inline-fill: #b3aca2;"
                        id="elw9liwhj5pwe" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M224.46,277.93h-.09a.93.93,0,0,1-.84-1c.53-5.4,3-12.5,12-15.69a.93.93,0,0,1,.63,1.75c-8,2.87-10.29,9.26-10.77,14.12A.92.92,0,0,1,224.46,277.93Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 230.148px 269.559px; --darkreader-inline-fill: #b3aca2;"
                        id="elzcmbebcfeke" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M227.52,278.44a1.18,1.18,0,0,1-.31-.05.92.92,0,0,1-.56-1.19c1.43-4.06,6.39-8,9.94-9a.93.93,0,0,1,1.15.65.92.92,0,0,1-.65,1.14c-3.1.87-7.48,4.39-8.69,7.81A.93.93,0,0,1,227.52,278.44Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 232.183px 273.302px; --darkreader-inline-fill: #b3aca2;"
                        id="eloiitjo1psu" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M228.47,282.39a.9.9,0,0,1-.54-.18.93.93,0,0,1-.21-1.3c2.63-3.61,8.73-7.4,16-7.25a.93.93,0,0,1,0,1.86h0c-6.58-.15-12.07,3.26-14.42,6.49A.93.93,0,0,1,228.47,282.39Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 236.094px 278.024px; --darkreader-inline-fill: #b3aca2;"
                        id="elkfsfvmomr2e" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M208.32,260.69c.8-3.66,4.26-7.18,7.65-7.18,0,0-1.67,3-.81,5.31,0,0,8.65-2.27,11.77,1.74,0,0-3.92.72-5.19,5.95C214.65,270.92,208.32,260.69,208.32,260.69Z"
                        style="fill: rgb(186, 104, 200); transform-origin: 217.625px 260.562px; --darkreader-inline-fill: #be70cb;"
                        id="el6488bwbuj97" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M159,278c-2.91-2.36-7.81-2.95-10.46-.83,0,0,3.17,1.3,3.95,3.65,0,0-8.17,3.62-8.11,8.71,0,0,3.54-1.87,7.8,1.42C160.45,290,159,278,159,278Z"
                        style="fill: rgb(186, 104, 200); transform-origin: 151.739px 283.407px; --darkreader-inline-fill: #be70cb;"
                        id="elj2mahygx3w7" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M189.34,261c-1.18.27-1.27-1.92-.73-4.64.49-2.46,2.47-7.37-1-7.31s-7.2,3.18-8.66,9.12a12.91,12.91,0,0,1-2.14-4.25c-.55-2.24-3.35-2.44-4.58,2-.94,3.39.69,6.78,1.59,8.2.5.79.29,2.1-1.38,3,0,0,7.21,2.47,12.07,0S189.34,261,189.34,261Z"
                        style="fill: rgb(186, 104, 200); transform-origin: 180.782px 258.634px; --darkreader-inline-fill: #be70cb;"
                        id="elgpih7x91cnk" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M180.79,280a2.17,2.17,0,0,0,2-2.37,23.85,23.85,0,0,0-5.51-12.67c-1.43.61-2.8,1.25-4.08,1.91,3.12,3.66,4.9,7.4,5.25,11.17a2.18,2.18,0,0,0,2.17,2Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 178px 272.5px; --darkreader-inline-fill: #b3aca2;"
                        id="elif7zqmv7n6" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M194,272.55a2.19,2.19,0,0,0,2.14,1.76,2,2,0,0,0,.42,0,2.18,2.18,0,0,0,1.72-2.56,23.47,23.47,0,0,0-6-11.26c-1.64.27-3.32.62-5.08,1.07C190.91,265,193.2,268.67,194,272.55Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 192.76px 267.406px; --darkreader-inline-fill: #b3aca2;"
                        id="elsnshnawyein" class="animable" data-darkreader-inline-fill=""></path>
                    <path
                        d="M180.12,263.76c2.29,2.53,5.95,7.38,6.82,13.27a2.17,2.17,0,0,0,2.15,1.86l.33,0a2.18,2.18,0,0,0,1.83-2.48,29.84,29.84,0,0,0-6.69-14.15c-1,.3-2,.63-3.08,1Z"
                        style="fill: rgb(69, 90, 100); transform-origin: 185.697px 270.575px; --darkreader-inline-fill: #b3aca2;"
                        id="elufqfz9ag7w8" class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <path
                    d="M101.31,404.62h-.16a1.63,1.63,0,0,1-1.47-1.78c.66-6.88,7.42-18.85,23.37-23.63,15.46-4.64,31.65.59,38.37,8.32a1.64,1.64,0,1,1-2.47,2.15c-4.95-5.7-19.49-12-35-7.34-14.4,4.32-20.48,14.81-21.06,20.81A1.64,1.64,0,0,1,101.31,404.62Z"
                    style="fill: rgb(69, 90, 100); transform-origin: 130.779px 391.041px; --darkreader-inline-fill: #b3aca2;"
                    id="el51m4pj5k4mq" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M117.32,417.12a1.64,1.64,0,0,1-1.64-1.62c0-3.35,2.47-14.77,10.8-21.94a29.81,29.81,0,0,1,32.5-4.27,1.64,1.64,0,0,1-1.58,2.87A26.38,26.38,0,0,0,128.61,396c-7.36,6.33-9.68,16.6-9.66,19.43a1.64,1.64,0,0,1-1.62,1.65Z"
                    style="fill: rgb(69, 90, 100); transform-origin: 137.72px 401.711px; --darkreader-inline-fill: #b3aca2;"
                    id="elxze22lw6c7j" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M96.38,251.94c-4.83,11.38-.41,35.57,9.5,50.48,10.7,16.1,32.4,36.37,56.74,45.37a1.64,1.64,0,0,1-.57,3.17,1.62,1.62,0,0,1-.56-.1c-25-9.26-47.34-30.09-58.33-46.63C92,287.5,87.7,260.59,94.24,248.87a16.12,16.12,0,0,1,1.63-2.41A28.89,28.89,0,0,1,96.38,251.94Z"
                    style="fill: rgb(69, 90, 100); transform-origin: 127.416px 298.71px; --darkreader-inline-fill: #b3aca2;"
                    id="eljvuvv3wa9z" class="animable" data-darkreader-inline-fill=""></path>
            </g>
        </g>
        <g id="freepik--Sign--inject-18" class="animable" style="transform-origin: 346.415px 200.98px;">
            <g id="freepik--sign--inject-18" class="animable" style="transform-origin: 346.415px 200.98px;">
                <polygon points="350.01 73.17 360.03 67.39 360.03 356.5 350.02 362.28 350.01 73.17"
                    style="fill: rgb(55, 71, 79); transform-origin: 355.02px 214.835px; --darkreader-inline-fill: #beb8b0;"
                    id="elm2fkmb7rb9s" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon
                    points="334.99 353.6 350.02 362.28 350.01 73.17 346.38 71.07 345.16 83.63 343.91 69.65 334.99 64.5 334.99 353.6"
                    style="fill: rgb(69, 90, 100); transform-origin: 342.505px 213.39px; --darkreader-inline-fill: #b3aca2;"
                    id="elmz7hw62ps8g" class="animable" data-darkreader-inline-fill=""></polygon>
                <g id="eli5aypanmbc">
                    <path
                        d="M350,269.13V233.49c-.58-13.85-1.25-32-1.14-39.93l-3.47-2c0,12.09-1.36,34.37-2.1,49.39-1,21.29,2.77,48.8,2.93,59.9s0,59.24,0,59.24l1.71,1s-.51-60.54.93-76.62C349.36,278.93,349.73,273.72,350,269.13Zm-3.43,7.54c-2.29-1-1.73-54.81.64-54C349.09,223.38,348.88,277.68,346.59,276.67Z"
                        style="opacity: 0.1; transform-origin: 346.561px 276.325px;" class="animable"></path>
                </g>
                <polygon points="346.38 71.07 343.91 69.65 345.16 83.63 346.38 71.07"
                    style="fill: rgb(38, 50, 56); transform-origin: 345.145px 76.64px; --darkreader-inline-fill: #cac6bf;"
                    id="elnla1pwv3t1b" class="animable" data-darkreader-inline-fill=""></polygon>
                <g id="eli3g05xuossb">
                    <path
                        d="M339.85,67.3c-.21,15.48,2.83,25.86,2.77,47.38,0,0-.34-15.22-2.39-26.5a136.68,136.68,0,0,1-2.28-22Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 340.285px 90.43px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="el74b5h049np3">
                    <path
                        d="M350,73.17c0,5.1-.22,16.73-.85,23.89a288.76,288.76,0,0,0-.23,29.9s-1.79-16.89-1.19-26.9.59-27.87.59-27.87Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 348.803px 99.575px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="el163sw4spun">
                    <path
                        d="M335,122v18.54c1.59-9.77,4.08-20.08,4.52-24.47.66-6.57-.44-18.64-1.56-25.46s-3-18.32-2.67-25.9L335,64.5V82.93l.15,1.19c1.24,9.12,1.89,22.62,1.43,28.64A66,66,0,0,1,335,122Z"
                        style="opacity: 0.1; transform-origin: 337.36px 102.52px;" class="animable"></path>
                </g>
                <g id="elwx4t3u5povi">
                    <path
                        d="M340.87,254c-.3,6.8,2.61,32.16,3.17,40.15,1.1,15.61.6,65,.6,65l-2-1.17s.24-55.84,0-62.33C342.29,286.69,340,261.87,340.87,254Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 342.714px 306.575px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="el99ena0cvenu">
                    <path
                        d="M342.62,190.46c0,12.36-.39,35.8-2,45.69a177.48,177.48,0,0,0-1,44.17,195.86,195.86,0,0,1,.58,33s-.61-19.06-2.34-34.66A235.12,235.12,0,0,1,338,232c1.36-15.08,1.75-43.77,1.75-43.77Z"
                        style="opacity: 0.1; transform-origin: 339.694px 250.775px;" class="animable"></path>
                </g>
                <g id="eln7b7lz00iwr">
                    <path
                        d="M337.37,187.43s-.23,19.63-.58,26.15-1.3,19.25-1.3,19.25-.31-20.9,0-27.61-.14-19.32-.14-19.32Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 336.36px 209.365px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="elq5dzxds0ax">
                    <path
                        d="M337.37,295.76c1.12,10.5,1.27,22.79,1.57,27.43s.76,33.13.76,33.13L337.37,355s-.2-29.51-.27-36.14C337,310.33,337.78,301.4,337.37,295.76Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 338.396px 326.04px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="elbkynqxsuats">
                    <path
                        d="M342.57,71.78c.51,8.15,2.41,16,3,21.74s1,23.41,1,23.41l-2-1.13S345,99.63,344,91.74,342.34,77,342.57,71.78Z"
                        style="opacity: 0.1; transform-origin: 344.547px 94.355px;" class="animable"></path>
                </g>
                <polygon points="360.03 67.39 345.01 58.71 334.99 64.5 350.01 73.17 360.03 67.39"
                    style="fill: rgb(38, 50, 56); transform-origin: 347.51px 65.94px; --darkreader-inline-fill: #cac6bf;"
                    id="elxnidpbe76of" class="animable" data-darkreader-inline-fill=""></polygon>
                <g id="elgfd2yxijwph">
                    <polygon points="360.03 232.18 350.02 237.96 350.02 252.01 360.03 246.22 360.03 232.18"
                        style="opacity: 0.15; transform-origin: 355.025px 242.095px;" class="animable"></polygon>
                </g>
                <g id="elljt911wk28d">
                    <polygon points="350.02 237.96 334.99 229.29 334.99 243.33 350.02 252.01 350.02 237.96"
                        style="opacity: 0.15; transform-origin: 342.505px 240.65px;" class="animable"></polygon>
                </g>
                <polygon points="252.78 138.79 438.04 245.71 448.78 239.53 263.54 132.57 252.78 138.79"
                    style="fill: rgb(38, 50, 56); transform-origin: 350.78px 189.14px; --darkreader-inline-fill: #cac6bf;"
                    id="el7o4mlguq6jf" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon
                    points="244.06 131.53 430.49 239.12 430.49 196.04 413.99 186.52 412.19 199.08 411.11 184.85 244.06 88.45 244.07 116.31 249.43 121.65 244.06 120.09 244.06 131.53"
                    style="fill: rgb(69, 90, 100); transform-origin: 337.275px 163.785px; --darkreader-inline-fill: #b3aca2;"
                    id="ellfwsd89zz8" class="animable" data-darkreader-inline-fill=""></polygon>
                <g id="elubqpbouh86c">
                    <path
                        d="M430.49,232c-9.7-5.62-50.5-28.64-55.2-30.88-13.66-6.54-25.44-11.68-43.72-22.09,0,0,8.48,6,26.76,15.48,8.58,4.42,16.44,8.2,20.57,10.25s51.59,29.38,51.59,29.38Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 381.03px 206.585px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="elaf2jnm8bfi">
                    <path
                        d="M244.1,97.69l15.91,9.2c14.25,8.25,23.83,14.19,30,19.87s18.17,12.87,23.55,15.8c0,0-6.32-2.3-18.16-9.63s-14-11.16-30.84-20.89L244.1,100.19Z"
                        style="opacity: 0.1; transform-origin: 278.83px 120.125px;" class="animable"></path>
                </g>
                <g id="eltj7wlmb8zc">
                    <path
                        d="M430.49,226.84l-49.65-28.65c-5.4-3.12-18.11-5.57-25.08-9.6A59.45,59.45,0,0,0,368,195.08c7.09,2.72,55.84,30.24,62.48,34.07Z"
                        style="opacity: 0.1; transform-origin: 393.125px 208.87px;" class="animable"></path>
                </g>
                <g id="ellrl0zm78f9s">
                    <path
                        d="M249.43,121.65l47.48,27.46c10.77,6.23,28.67,18.74,43.75,26.91s26.2,12.86,26.2,12.86-14.43-4.11-26.36-11-33.65-20.48-46.75-28.06l-49.68-28.73v-1Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 305.465px 154.485px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="el5bxbttxnc6">
                    <path
                        d="M430.49,211.43c-10-5.79-43.12-24.88-51-29.46s-20-13-33.41-20.8a236.41,236.41,0,0,0-32.89-15.86,165.26,165.26,0,0,1-17.74-8.57A152.14,152.14,0,0,0,317.58,149c13.31,6.05,29.25,14.38,43.4,24.44s69.51,40.82,69.51,40.82Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 362.97px 175.5px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="el0r3td809late">
                    <path
                        d="M244.11,91.9s59.93,34,74.91,42.63,34.61,20.72,34.61,20.72S322,138.4,290.26,120.07l-46.15-26.7Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 298.87px 123.575px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="el35jgeoylmv8">
                    <path
                        d="M430.49,203.34s-69.23-40-88.75-51.26-41.25-21.71-41.25-21.71S316.7,141.09,340.67,155c7.1,4.12,89.82,51.88,89.82,51.88v-3.53"
                        style="opacity: 0.1; transform-origin: 365.49px 168.625px;" class="animable"></path>
                </g>
                <g id="elf3ww5bvwmmt">
                    <path
                        d="M244.06,124.76l53.65,31c11,6.36,39.53,23.75,46.33,28.06,0,0-28.09-14.76-65.45-36.37l-34.53-20Z"
                        style="opacity: 0.1; transform-origin: 294.05px 154.29px;" class="animable"></path>
                </g>
                <g id="elk7d9lrumsm">
                    <path
                        d="M244.08,115l45.19,26.14c10.51,6.08,35,22.61,45.81,28.84s81.89,44.94,95.41,52.76v-3c-8.39-4.86-76.5-49.07-92.77-58.49s-32.93-14.14-43.07-20L244.08,112Zm70.32,38.47c0-1.51,13.88,4.83,23.42,10.34,8.41,4.87,25.12,16.12,25.12,17.52s-16.33-7.36-25.12-12.45S314.4,155,314.4,153.46Z"
                        style="opacity: 0.1; transform-origin: 337.285px 167.37px;" class="animable"></path>
                </g>
                <g id="eldu38rzxd2b6">
                    <path
                        d="M244.11,103.41c6.57,3.8,27,15.38,32.74,19.75s11.6,11.42,22.6,17.78c0,0-11.35-4.74-17.88-10.93s-37.52-23.53-37.52-23.53Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 271.75px 122.175px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="el8yv0asducqx">
                    <polygon
                        points="263.62 99.74 411.24 186.66 412.24 190.69 413.75 188.15 428.62 197.44 430.49 239.12 430.49 196.04 413.99 186.52 412.55 185.66 411.11 184.85 263.62 99.74"
                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 347.055px 169.43px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></polygon>
                </g>
                <polygon points="441.23 232.91 430.49 239.12 430.49 196.04 441.23 189.71 441.23 232.91"
                    style="fill: rgb(55, 71, 79); transform-origin: 435.86px 214.415px; --darkreader-inline-fill: #beb8b0;"
                    id="eloamigbhcxbj" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="413.99 186.52 412.19 199.08 411.11 184.85 412.55 185.66 413.99 186.52"
                    style="fill: rgb(38, 50, 56); transform-origin: 412.55px 191.965px; --darkreader-inline-fill: #cac6bf;"
                    id="elwr7sla0kyx" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="411.11 184.85 412.55 185.66 412.19 199.08 411.11 184.85"
                    style="fill: rgb(55, 71, 79); transform-origin: 411.83px 191.965px; --darkreader-inline-fill: #beb8b0;"
                    id="elmrdrozt6bqr" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="244.07 116.31 245.67 119.28 244.07 120.09 249.43 121.65 244.07 116.31"
                    style="fill: rgb(55, 71, 79); transform-origin: 246.75px 118.98px; --darkreader-inline-fill: #beb8b0;"
                    id="elihilrgldmu" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="244.07 116.31 245.67 119.28 249.43 121.65 244.07 116.31"
                    style="fill: rgb(38, 50, 56); transform-origin: 246.75px 118.98px; --darkreader-inline-fill: #cac6bf;"
                    id="elc97feyp069e" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="435.04 232.84 430.49 233 422.15 229.46 430.49 237.5 435.04 232.84"
                    style="fill: rgb(38, 50, 56); transform-origin: 428.595px 233.48px; --darkreader-inline-fill: #cac6bf;"
                    id="elwqxwc8gswnf" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="435.04 232.84 430.49 235.14 422.15 229.46 430.49 233 435.04 232.84"
                    style="fill: rgb(55, 71, 79); transform-origin: 428.595px 232.3px; --darkreader-inline-fill: #beb8b0;"
                    id="elo1oq0k1vig8" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="244.06 88.45 430.49 196.04 441.23 189.71 254.92 82.18 244.06 88.45"
                    style="fill: rgb(38, 50, 56); transform-origin: 342.645px 139.11px; --darkreader-inline-fill: #cac6bf;"
                    id="elguhskl8j07" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon
                    points="249.06 89.04 434.32 195.96 434.32 152.88 267.45 56.58 265.65 69.14 264.57 54.91 249.06 45.96 249.06 89.04"
                    style="fill: rgb(69, 90, 100); transform-origin: 341.69px 120.96px; --darkreader-inline-fill: #b3aca2;"
                    id="elenpawe09s6l" class="animable" data-darkreader-inline-fill=""></polygon>
                <g id="elergrr29244s">
                    <path
                        d="M434.32,188.79c-9.7-5.61-50.49-28.63-55.2-30.87-13.66-6.54-25.44-11.68-43.71-22.09,0,0,8.47,6,26.75,15.48,8.58,4.42,16.45,8.2,20.57,10.25s51.59,29.38,51.59,29.38Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 384.865px 163.385px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="elcwy23gf7ih9">
                    <path
                        d="M249.1,55.2l14.74,8.53c14.26,8.25,23.83,14.18,30,19.86S312,96.47,317.42,99.39c0,0-6.33-2.29-18.17-9.63s-14-11.15-30.84-20.89L249.09,57.7Z"
                        style="opacity: 0.1; transform-origin: 283.255px 77.295px;" class="animable"></path>
                </g>
                <g id="eljogrez2ukv9">
                    <path
                        d="M434.32,183.68c-10.19-5.9-44.26-25.53-49.65-28.65s-18.11-5.57-25.08-9.6a59.45,59.45,0,0,0,12.25,6.49c7.09,2.72,55.85,30.24,62.48,34.07Z"
                        style="opacity: 0.1; transform-origin: 396.955px 165.71px;" class="animable"></path>
                </g>
                <g id="elo9fh4lfp24l">
                    <path
                        d="M249.07,76.06,300.74,106c10.77,6.23,28.67,18.74,43.76,26.91s26.19,12.86,26.19,12.86-14.43-4.11-26.36-11-33.65-20.48-46.74-28.06L249.06,78.57Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 309.875px 110.915px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="elxwf0op0sh7s">
                    <path
                        d="M434.32,168.27c-10-5.79-43.12-24.88-51-29.46s-20-13-33.41-20.8A235.26,235.26,0,0,0,317,102.15a165.26,165.26,0,0,1-17.74-8.57,152.14,152.14,0,0,0,22.17,12.26c13.31,6,29.25,14.38,43.4,24.44s69.51,40.82,69.51,40.82Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 366.8px 132.34px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="eltuhs4j2i57">
                    <path
                        d="M249.11,49.41C307,82.2,306.74,82,322.86,91.36c15,8.67,34.6,20.73,34.6,20.73S325.78,95.24,294.1,76.91l-45-26Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 303.28px 80.75px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="elx4jgj5bhqf">
                    <path
                        d="M434.32,160.18s-69.23-40-88.75-51.26-41.25-21.71-41.25-21.71,16.21,10.71,40.18,24.62c7.1,4.12,89.82,51.88,89.82,51.88v-3.53"
                        style="opacity: 0.1; transform-origin: 369.32px 125.46px;" class="animable"></path>
                </g>
                <g id="elap8uexst0ci">
                    <path
                        d="M249.06,82.27l52.48,30.36c11,6.36,39.53,23.74,46.33,28.06,0,0-28.09-14.76-65.45-36.37L249.05,85Z"
                        style="opacity: 0.1; transform-origin: 298.46px 111.48px;" class="animable"></path>
                </g>
                <g id="elb8idgrti1oo">
                    <path
                        d="M249.07,72.5,293.1,98c10.51,6.08,35,22.61,45.81,28.84s81.89,44.94,95.41,52.76v-3c-8.39-4.85-76.49-49.07-92.77-58.48s-32.92-14.14-43.07-20l-49.4-28.58Zm69.17,37.8c0-1.51,13.88,4.82,23.41,10.34,8.41,4.87,25.12,16.12,25.12,17.52s-16.33-7.36-25.12-12.45S318.23,111.81,318.24,110.3Z"
                        style="opacity: 0.1; transform-origin: 341.695px 124.57px;" class="animable"></path>
                </g>
                <g id="eln2o2jjv8kn">
                    <path
                        d="M249.1,60.92c6.58,3.8,25.88,14.7,31.58,19.08s11.6,11.42,22.6,17.78c0,0-11.35-4.74-17.88-10.94S249.05,64,249.05,64Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 276.165px 79.35px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <polygon points="267.45 56.58 266.01 55.75 264.57 54.91 265.65 69.14 267.45 56.58"
                    style="fill: rgb(38, 50, 56); transform-origin: 266.01px 62.025px; --darkreader-inline-fill: #cac6bf;"
                    id="elf4xfu6enl7f" class="animable" data-darkreader-inline-fill=""></polygon>
                <g id="eloabh3dogy08">
                    <polygon points="267.45 56.58 432.46 154.28 434.32 195.96 434.32 152.88 267.45 56.58"
                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 350.885px 126.27px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></polygon>
                </g>
                <polygon points="434.32 166.48 424.2 163.48 434.32 171.74 434.32 166.48"
                    style="fill: rgb(55, 71, 79); transform-origin: 429.26px 167.61px; --darkreader-inline-fill: #beb8b0;"
                    id="elu002vtwjr0i" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="445.06 189.71 434.32 195.96 434.32 152.88 445.06 146.51 445.06 189.71"
                    style="fill: rgb(55, 71, 79); transform-origin: 439.69px 171.235px; --darkreader-inline-fill: #beb8b0;"
                    id="el535r7bggb92" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="434.32 152.88 445.06 146.51 259.97 39.68 249.06 45.96 434.32 152.88"
                    style="fill: rgb(38, 50, 56); transform-origin: 347.06px 96.28px; --darkreader-inline-fill: #cac6bf;"
                    id="eltlqz9iknfpb" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="434.32 166.48 437.19 167.5 434.32 171.74 434.32 166.48"
                    style="fill: rgb(55, 71, 79); transform-origin: 435.755px 169.11px; --darkreader-inline-fill: #beb8b0;"
                    id="elkc9zgxl12y8" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="437.19 167.5 434.32 169.16 424.2 163.48 434.32 171.74 437.19 167.5"
                    style="fill: rgb(38, 50, 56); transform-origin: 430.695px 167.61px; --darkreader-inline-fill: #cac6bf;"
                    id="el9m7492ifkp" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="264.57 54.91 266.01 55.75 265.65 69.14 264.57 54.91"
                    style="fill: rgb(55, 71, 79); transform-origin: 265.29px 62.025px; --darkreader-inline-fill: #beb8b0;"
                    id="elc7x0523jd9s" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon
                    points="252.78 138.79 438.04 245.71 438.04 288.79 271.17 192.49 269.37 177.85 268.29 190.82 252.78 181.87 252.78 138.79"
                    style="fill: rgb(69, 90, 100); transform-origin: 345.41px 213.79px; --darkreader-inline-fill: #b3aca2;"
                    id="eld6yoq9mr4p9" class="animable" data-darkreader-inline-fill=""></polygon>
                <g id="elru6loj61y">
                    <path
                        d="M438,252.88c-9.7-5.59-50.5-29.6-55.2-32.78-13.66-9.24-25.44-17.7-43.72-28.39,0,0,8.48,3.73,26.76,15.41,8.58,5.49,35.68,21.85,39.8,24.56S438,250.74,438,250.74Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 388.54px 222.295px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="eldio3de6qecu">
                    <path
                        d="M252.82,172.67l14.74,8.5c14.25,8.21,23.83,13.33,30,14.8s18.17,8.1,23.55,11.4A132.87,132.87,0,0,0,303,196c-11.85-6.34-14-5-30.84-14.71l-19.32-11.14Z"
                        style="opacity: 0.1; transform-origin: 286.965px 188.76px;" class="animable"></path>
                </g>
                <g id="elydv2he29f8o">
                    <path
                        d="M438,258c-10.2-5.87-25-14.43-30.42-17.54s-37.34-26.4-44.31-30.42a63.19,63.19,0,0,1,12.25,7.67c7.09,5.45,55.84,34.16,62.48,38Z"
                        style="opacity: 0.1; transform-origin: 400.635px 234.02px;" class="animable"></path>
                </g>
                <g id="elzgtcu7hdmy">
                    <path
                        d="M252.79,151.78l51.67,29.78c10.77,6.2,28.67,14.37,43.75,23.61s26.2,17.39,26.2,17.39S360,210,348,203.13s-33.64-18.36-46.74-25.91l-48.52-28Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 313.575px 185.89px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="elf1culddvbcj">
                    <path
                        d="M438,273.4l-31.81-18.33c-7.92-4.57-39.21-21.1-52.64-28.84a304.68,304.68,0,0,1-32.89-22.12A204.3,204.3,0,0,0,303,192.2s8.86,4,22.17,13.34,29.25,19.39,43.4,25.67S438,270.58,438,270.58Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 370.5px 232.8px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="elhvakpblb5l">
                    <path
                        d="M252.83,178.48s58.76,34.57,73.74,43.2,34.61,19.24,34.61,19.24-31.68-19.74-63.37-38l-45-25.93Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 306.995px 208.955px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <g id="el5z42opwu2al">
                    <path
                        d="M438,281.49l-88.75-51.14C329.78,219.11,308,204.43,308,204.43s16.21,8,40.18,21.78C355.32,230.29,438,278,438,278v3.52"
                        style="opacity: 0.1; transform-origin: 373px 242.975px;" class="animable"></path>
                </g>
                <g id="elcfg3gff9cyk">
                    <path
                        d="M252.78,145.56l52.48,30.25c11,6.34,39.53,21.89,46.33,25.43,0,0-28.09-17.68-65.45-39.2l-33.37-19.23Z"
                        style="opacity: 0.1; transform-origin: 302.18px 172.025px;" class="animable"></path>
                </g>
                <g id="elggjhjftss6r">
                    <path
                        d="M252.8,158.39l49.4,28.47c10.14,5.84,26.8,20.34,43.07,29.72s84.38,43.73,92.77,48.56v-3c-13.52-7.79-84.65-51.13-95.41-57.33s-35.3-18-45.82-24.06l-44-25.37ZM345.37,209c8.79,5.07,25.12,15.16,25.12,16.56s-16.71-6.64-25.12-11.48c-9.54-5.5-23.41-15.19-23.42-16.7S336.57,204,345.37,209Z"
                        style="opacity: 0.1; transform-origin: 345.42px 210.26px;" class="animable"></path>
                </g>
                <g id="elvc9umbisc7o">
                    <path
                        d="M252.82,167c6.58,3.79,25.88,15.18,31.58,17.38s11.6,2,22.6,8.33c0,0-11.35-8.37-17.88-9.72s-36.35-19.12-36.35-19.12Z"
                        style="fill: rgb(255, 255, 255); opacity: 0.05; transform-origin: 279.885px 178.29px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></path>
                </g>
                <polygon points="271.17 192.49 269.23 188.03 268.29 190.82 269.37 177.85 271.17 192.49"
                    style="fill: rgb(38, 50, 56); transform-origin: 269.73px 185.17px; --darkreader-inline-fill: #cac6bf;"
                    id="elzv0xsna2wz" class="animable" data-darkreader-inline-fill=""></polygon>
                <g id="el5inz78qr07j">
                    <polygon points="271.17 149.41 436.17 247.11 438.04 288.79 438.04 245.71 271.17 149.41"
                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 354.605px 219.1px; --darkreader-inline-fill: #e8e6e3;"
                        class="animable" data-darkreader-inline-fill=""></polygon>
                </g>
                <polygon points="438.04 275.19 427.92 266.51 438.04 269.93 438.04 275.19"
                    style="fill: rgb(55, 71, 79); transform-origin: 432.98px 270.85px; --darkreader-inline-fill: #beb8b0;"
                    id="el2gklmj1gcai" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="448.78 239.53 438.04 245.71 438.04 288.79 448.78 282.6 448.78 239.53"
                    style="fill: rgb(55, 71, 79); transform-origin: 443.41px 264.16px; --darkreader-inline-fill: #beb8b0;"
                    id="elrtales3lt38" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="438.04 275.19 445.91 267.37 438.04 269.93 438.04 275.19"
                    style="fill: rgb(55, 71, 79); transform-origin: 441.975px 271.28px; --darkreader-inline-fill: #beb8b0;"
                    id="ellrszkkshwpa" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="445.91 267.37 438.04 272.51 427.92 266.51 438.04 269.93 445.91 267.37"
                    style="fill: rgb(38, 50, 56); transform-origin: 436.915px 269.51px; --darkreader-inline-fill: #cac6bf;"
                    id="elzo6mnlklqgm" class="animable" data-darkreader-inline-fill=""></polygon>
                <polygon points="268.29 190.82 269.23 188.03 269.37 177.85 268.29 190.82"
                    style="fill: rgb(55, 71, 79); transform-origin: 268.83px 184.335px; --darkreader-inline-fill: #beb8b0;"
                    id="elhzfzluajki6" class="animable" data-darkreader-inline-fill=""></polygon>
                <path
                    d="M340,118.8a27.58,27.58,0,0,1,7.44,6.25,37.35,37.35,0,0,1,5.16,8.21,43.33,43.33,0,0,1,3,9.45,59.87,59.87,0,0,1,1.19,9.87q.11,3.88.11,8t-.11,7.75a38.63,38.63,0,0,1-1.19,8.5,13.15,13.15,0,0,1-3,5.92,7.51,7.51,0,0,1-5.16,2.26q-3.12.15-7.44-2.35a27.37,27.37,0,0,1-7.44-6.24,37.18,37.18,0,0,1-5.16-8.22,43.24,43.24,0,0,1-3-9.44,60.13,60.13,0,0,1-1.19-9.87q-.11-3.7-.11-7.88t.11-7.92a38.72,38.72,0,0,1,1.19-8.51,13.11,13.11,0,0,1,3-5.91,7.46,7.46,0,0,1,5.16-2.26Q335.68,116.31,340,118.8Zm6.17,43q.22-7.41,0-14.92a43.47,43.47,0,0,0-.43-4.33,18.59,18.59,0,0,0-1-3.82,12.34,12.34,0,0,0-1.85-3.24A10,10,0,0,0,340,133a5,5,0,0,0-2.88-.86,2.34,2.34,0,0,0-1.85.92,7.88,7.88,0,0,0-1.06,2.78,21.92,21.92,0,0,0-.38,3.9q-.29,7.2,0,14.91a32.44,32.44,0,0,0,.38,4.3,17.19,17.19,0,0,0,1,3.84,13.14,13.14,0,0,0,1.88,3.26,10,10,0,0,0,2.88,2.46,4.9,4.9,0,0,0,2.88.87,2.66,2.66,0,0,0,1.88-1.1,6.45,6.45,0,0,0,1-2.64A24.92,24.92,0,0,0,346.17,161.78Z"
                    style="fill: rgb(38, 50, 56); transform-origin: 340px 150.712px; --darkreader-inline-fill: #cac6bf;"
                    id="ely0ekmyakr8" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M352.6,182.79a7.46,7.46,0,0,1-5.17,2.27c-2.07.1-4.54-.68-7.43-2.34a27.38,27.38,0,0,1-7.43-6.25,36.77,36.77,0,0,1-2.7-3.7l3.52-2c.72,1.06,1.48,2.08,2.3,3.07a27.38,27.38,0,0,0,7.43,6.25q4.32,2.49,7.45,2.34a9,9,0,0,0,2.88-.61A9.61,9.61,0,0,1,352.6,182.79Z"
                    style="fill: rgb(55, 71, 79); transform-origin: 341.66px 177.919px; --darkreader-inline-fill: #beb8b0;"
                    id="ell0m6dzgsenp" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M346.82,134l-3.53,2.07c-.13-.2-.26-.41-.4-.6A10.21,10.21,0,0,0,340,133a5,5,0,0,0-2.88-.86,2.33,2.33,0,0,0-1.85.92c-.3.43-.32.47,0,0a2.64,2.64,0,0,1,.64-.65L339,130a2.31,2.31,0,0,1,1.27-.5,4.88,4.88,0,0,1,2.88.86A9.74,9.74,0,0,1,346,132.8,10.61,10.61,0,0,1,346.82,134Z"
                    style="fill: rgb(55, 71, 79); transform-origin: 340.929px 132.784px; --darkreader-inline-fill: #beb8b0;"
                    id="el4zw309y87s5" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M355.65,142.52a43.07,43.07,0,0,0-3-9.44,37.18,37.18,0,0,0-5.16-8.22,27.58,27.58,0,0,0-7.44-6.25q-4.32-2.49-7.44-2.34a8.14,8.14,0,0,0-2.71.6,14,14,0,0,0-2.38,5.1,38.65,38.65,0,0,0-1.18,8.5c-.08,2.5-.12,5.15-.12,7.93s0,5.4.12,7.87a59.84,59.84,0,0,0,1.18,9.87,43.33,43.33,0,0,0,3,9.45,36.79,36.79,0,0,0,5.17,8.21,27.21,27.21,0,0,0,7.43,6.25c2.89,1.67,5.36,2.44,7.44,2.34a9.23,9.23,0,0,0,2.89-.6,14.62,14.62,0,0,0,2.27-5.16,38.83,38.83,0,0,0,1.12-8.44q.11-3.57.11-7.74c0-2.79,0-5.47-.11-8.06A60.13,60.13,0,0,0,355.65,142.52Zm-6.36,16.59a24.93,24.93,0,0,1-.37,3.87,6.31,6.31,0,0,1-1,2.64,2.94,2.94,0,0,1-.67.65s-2.88,2.31-3.13,2.49a2.7,2.7,0,0,1-1.2.43,4.9,4.9,0,0,1-2.88-.87,9.85,9.85,0,0,1-2.88-2.46,13.14,13.14,0,0,1-1.88-3.26,17.19,17.19,0,0,1-1-3.84,32.28,32.28,0,0,1-.38-4.29q-.29-7.72,0-14.92a22.24,22.24,0,0,1,.4-3.85,7.2,7.2,0,0,1,1-2.64,2.83,2.83,0,0,1,.64-.65c.35-.26,2.84-2.27,3.06-2.43a2.52,2.52,0,0,1,1.27-.51,5,5,0,0,1,2.88.87A10.06,10.06,0,0,1,346,132.8a12.94,12.94,0,0,1,1.84,3.24,18.23,18.23,0,0,1,1,3.83,43.47,43.47,0,0,1,.43,4.33Q349.53,151.7,349.29,159.11Z"
                    style="fill: rgb(186, 104, 200); transform-origin: 341.585px 149.33px; --darkreader-inline-fill: #be70cb;"
                    id="elvkn9qhp3exp" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M302.7,160.29a2.93,2.93,0,0,1-1.1-1.34,4.5,4.5,0,0,1-.46-2v-9.05L283,137.45a2.88,2.88,0,0,1-1.1-1.34,4.49,4.49,0,0,1-.46-2v-9.41a6,6,0,0,1,.75-3.39l17.24-23.51a1.73,1.73,0,0,1,.95-.74,2,2,0,0,1,1.18.38l8.71,5a3,3,0,0,1,1.1,1.34,4.71,4.71,0,0,1,.46,2v34.08l4.95,2.87a2.88,2.88,0,0,1,1.1,1.34,4.49,4.49,0,0,1,.46,2v9.41a1.88,1.88,0,0,1-.46,1.42.84.84,0,0,1-1.1.08l-4.95-2.86v9.05a1.92,1.92,0,0,1-.46,1.42.84.84,0,0,1-1.1.08Zm-1.27-26.39V117.57L293,129Zm-.29,14"
                    style="fill: rgb(38, 50, 56); transform-origin: 299.886px 130.949px; --darkreader-inline-fill: #cac6bf;"
                    id="el0ga2ch2yqg8l" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M317.86,156.88a1.88,1.88,0,0,0,.46-1.42v-2.07l-3.39-2-3.12,2.67,4.95,2.86A.84.84,0,0,0,317.86,156.88Z"
                    style="fill: rgb(55, 71, 79); transform-origin: 315.069px 154.248px; --darkreader-inline-fill: #beb8b0;"
                    id="el4ao8hkk0c1x" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M311.81,161.08v2.07a1.87,1.87,0,0,1-.47,1.42.84.84,0,0,1-1.1.08l-7.54-4.36a2.94,2.94,0,0,1-1.1-1.34l-.06-.16,3.12-2.66a1,1,0,0,0,.06.16,3,3,0,0,0,1.1,1.34Z"
                    style="fill: rgb(55, 71, 79); transform-origin: 306.679px 160.474px; --darkreader-inline-fill: #beb8b0;"
                    id="el5xzv8xr0pzw" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M304.26,145.28l-3.12,2.66L283,137.45a2.9,2.9,0,0,1-1.08-1.34c-.05-.1-.07-.19-.11-.29l3.23-2.38a2.85,2.85,0,0,0,1.1,1.35Z"
                    style="fill: rgb(55, 71, 79); transform-origin: 293.035px 140.69px; --darkreader-inline-fill: #beb8b0;"
                    id="elt1cr0plril" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M316.76,142.57l-4.95-2.86V105.62a4.63,4.63,0,0,0-.46-2,2.94,2.94,0,0,0-1.1-1.34l-8.71-5a2.44,2.44,0,0,0-.41-.19L285.29,118.7a6,6,0,0,0-.75,3.38v9.41a4.51,4.51,0,0,0,.47,2,2.86,2.86,0,0,0,1.09,1.34l18.16,10.49v9.05a4.49,4.49,0,0,0,.46,1.95,3,3,0,0,0,1.1,1.35l6,3.45v-7h0l3.12-2.67,3.39,2v-7.52a4.56,4.56,0,0,0-.46-2A2.88,2.88,0,0,0,316.76,142.57Zm-12.21-11.33-3.12,2.48h0L293,128.86l8.42-11.48h0l3.12-2.47Z"
                    style="fill: rgb(186, 104, 200); transform-origin: 301.427px 129.105px; --darkreader-inline-fill: #be70cb;"
                    id="el5jnnzwpmqgm" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M382.9,206.59a2.88,2.88,0,0,1-1.1-1.34,4.49,4.49,0,0,1-.46-1.95v-9.06l-18.16-10.48a2.91,2.91,0,0,1-1.1-1.35,4.49,4.49,0,0,1-.46-1.95v-9.41a6,6,0,0,1,.75-3.38l17.24-23.51a1.61,1.61,0,0,1,.95-.74,2,2,0,0,1,1.18.37l8.71,5a2.92,2.92,0,0,1,1.09,1.34,4.49,4.49,0,0,1,.46,2V186.2l5,2.86a2.88,2.88,0,0,1,1.1,1.34,4.56,4.56,0,0,1,.46,2v9.41a1.9,1.9,0,0,1-.46,1.42.84.84,0,0,1-1.1.07l-5-2.86v9a1.87,1.87,0,0,1-.46,1.42.82.82,0,0,1-1.09.08Zm-1.27-26.38V163.87l-8.42,11.48Zm-.29,14"
                    style="fill: rgb(38, 50, 56); transform-origin: 380.086px 177.265px; --darkreader-inline-fill: #cac6bf;"
                    id="el0i69y67mr1vc" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M398.06,203.19a1.9,1.9,0,0,0,.46-1.42V199.7l-3.39-2L392,200.4l5,2.86A.84.84,0,0,0,398.06,203.19Z"
                    style="fill: rgb(55, 71, 79); transform-origin: 395.264px 200.558px; --darkreader-inline-fill: #beb8b0;"
                    id="el8248hvccqk" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M392,207.39v2.07a1.86,1.86,0,0,1-.47,1.41.83.83,0,0,1-1.1.08l-7.54-4.35a3,3,0,0,1-1.1-1.35l-.06-.16,3.12-2.66a.52.52,0,0,0,.06.16,3,3,0,0,0,1.1,1.34Z"
                    style="fill: rgb(55, 71, 79); transform-origin: 386.869px 206.776px; --darkreader-inline-fill: #beb8b0;"
                    id="el8dghg80jc4p" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M384.46,191.58l-3.12,2.67-18.17-10.5a2.79,2.79,0,0,1-1.08-1.34,1.62,1.62,0,0,1-.11-.28l3.23-2.38a2.91,2.91,0,0,0,1.09,1.34Z"
                    style="fill: rgb(55, 71, 79); transform-origin: 373.22px 187px; --darkreader-inline-fill: #beb8b0;"
                    id="elo4o2afbozl8" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M397,188.87,392,186V151.92a4.49,4.49,0,0,0-.46-1.95,2.92,2.92,0,0,0-1.09-1.34l-8.71-5a3.61,3.61,0,0,0-.41-.19L365.49,165a6,6,0,0,0-.75,3.39v9.41a4.5,4.5,0,0,0,.47,1.95,2.86,2.86,0,0,0,1.09,1.34l18.16,10.49v9a4.5,4.5,0,0,0,.46,2,2.93,2.93,0,0,0,1.1,1.34l6,3.45v-7h0l3.13-2.66,3.39,2v-7.53a4.49,4.49,0,0,0-.46-1.95A3,3,0,0,0,397,188.87Zm-12.21-11.33L381.63,180h0l-8.42-4.86,8.42-11.48h0l3.12-2.47Z"
                    style="fill: rgb(186, 104, 200); transform-origin: 381.631px 175.405px; --darkreader-inline-fill: #be70cb;"
                    id="elacu45m0e34" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M286.88,177.89a.57.57,0,0,1,.21.26.84.84,0,0,1,.09.37v1.81a.38.38,0,0,1-.09.28.16.16,0,0,1-.21,0l-5.26-3a.63.63,0,0,1-.21-.26.87.87,0,0,1-.08-.38v-11a.38.38,0,0,1,.08-.28.16.16,0,0,1,.21,0l5.18,3a.63.63,0,0,1,.21.26,1,1,0,0,1,.08.38v1.81a.41.41,0,0,1-.08.27.17.17,0,0,1-.21,0l-3.42-2v1.85l3.17,1.83a.57.57,0,0,1,.21.26.84.84,0,0,1,.09.37v1.82a.37.37,0,0,1-.09.27.15.15,0,0,1-.21,0L283.38,174v1.92Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 284.254px 173.15px; --darkreader-inline-fill: #e5e3df;"
                    id="elt7qjznx9fg9" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M292.35,174.9a.53.53,0,0,1,.22.26,1,1,0,0,1,.08.37v1.73a.41.41,0,0,1-.08.27.17.17,0,0,1-.22,0l-1-.58c-.68-.39-1-.06-1,1v4.21a.37.37,0,0,1-.09.27c-.05.06-.12.06-.21,0l-1.39-.8a.51.51,0,0,1-.21-.26.88.88,0,0,1-.09-.38v-8a.37.37,0,0,1,.09-.27c.05-.06.12-.06.21,0l1.28.74a.57.57,0,0,1,.21.26.84.84,0,0,1,.09.37v.4a1,1,0,0,1,.62-.26,1.53,1.53,0,0,1,.86.25Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 290.505px 177.575px; --darkreader-inline-fill: #e5e3df;"
                    id="elvcmet48824n" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M297.45,177.84a.52.52,0,0,1,.21.26.84.84,0,0,1,.09.37v1.73a.37.37,0,0,1-.09.27.15.15,0,0,1-.21,0l-1-.58c-.68-.39-1-.06-1,1v4.21a.37.37,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.4-.8a.63.63,0,0,1-.21-.26.88.88,0,0,1-.09-.38v-8a.37.37,0,0,1,.09-.27.15.15,0,0,1,.21,0l1.29.74a.57.57,0,0,1,.21.26.84.84,0,0,1,.09.37v.4a.94.94,0,0,1,.61-.26,1.53,1.53,0,0,1,.86.25Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 295.6px 180.515px; --darkreader-inline-fill: #e5e3df;"
                    id="el95evrx39zc6" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M304.25,185.56c0,.17,0,.39,0,.66s0,.48,0,.65a4.38,4.38,0,0,1-.25,1.4,2,2,0,0,1-.61.9,1.35,1.35,0,0,1-.93.3,2.5,2.5,0,0,1-1.23-.39,4.92,4.92,0,0,1-1.23-1,6.62,6.62,0,0,1-.93-1.39,7.55,7.55,0,0,1-.61-1.6,7.68,7.68,0,0,1-.25-1.68c0-.18,0-.4,0-.67s0-.48,0-.65a4.41,4.41,0,0,1,.23-1.4,2.1,2.1,0,0,1,.62-.9,1.46,1.46,0,0,1,.94-.31,2.5,2.5,0,0,1,1.23.39,4.92,4.92,0,0,1,1.23,1,7.45,7.45,0,0,1,.94,1.4,8.22,8.22,0,0,1,.61,1.61A8.1,8.1,0,0,1,304.25,185.56Zm-4-1.11a2.87,2.87,0,0,0,.3,1.2,1.82,1.82,0,0,0,.72.78.62.62,0,0,0,.72,0,1.1,1.1,0,0,0,.3-.84,4.79,4.79,0,0,0,0-.56,5.62,5.62,0,0,0,0-.6,2.86,2.86,0,0,0-.3-1.19,1.89,1.89,0,0,0-.72-.78c-.3-.17-.54-.19-.72-.05a1.1,1.1,0,0,0-.3.84,5,5,0,0,0,0,.57A5.43,5.43,0,0,0,300.21,184.45Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 301.23px 184.476px; --darkreader-inline-fill: #e5e3df;"
                    id="elwoloyt01rz" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M309.32,184.69a.63.63,0,0,1,.21.26.88.88,0,0,1,.09.38v1.72a.34.34,0,0,1-.09.27.15.15,0,0,1-.21,0l-1-.58c-.68-.4-1-.07-1,1v4.2a.34.34,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.4-.81a.57.57,0,0,1-.21-.26.84.84,0,0,1-.09-.37v-8a.38.38,0,0,1,.09-.28.16.16,0,0,1,.21,0l1.29.74a.63.63,0,0,1,.21.26.88.88,0,0,1,.09.38v.39a1,1,0,0,1,.61-.26,1.55,1.55,0,0,1,.86.26Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 307.47px 187.352px; --darkreader-inline-fill: #e5e3df;"
                    id="el1qp4djilr8" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M309.76,191.34a.76.76,0,0,1,.14-.38c.08-.09.19-.1.34,0l1.36.78a.48.48,0,0,1,.18.21.92.92,0,0,1,.07.31c0,.05,0,.08,0,.11l-.87,2.9a.85.85,0,0,1-.15.28c-.07.08-.18.08-.33,0l-.83-.48a.38.38,0,0,1-.17-.21.66.66,0,0,1-.07-.3v0Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 310.64px 193.249px; --darkreader-inline-fill: #e5e3df;"
                    id="elsyb2lpw415" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M318.76,199.2a3.15,3.15,0,0,1-.57-.43,3.84,3.84,0,0,1-.42-.5,3.39,3.39,0,0,1-.3-.51c-.08-.17-.15-.31-.2-.45V201a.34.34,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.4-.81a.52.52,0,0,1-.21-.26.84.84,0,0,1-.09-.37V188.59a.37.37,0,0,1,.09-.27.17.17,0,0,1,.21,0l1.35.78a.57.57,0,0,1,.21.26.84.84,0,0,1,.09.37v.4c.06-.08.14-.16.21-.24a.64.64,0,0,1,.29-.16.85.85,0,0,1,.42,0,2,2,0,0,1,.62.26,3.75,3.75,0,0,1,.94.78,4.71,4.71,0,0,1,.78,1.16,7.94,7.94,0,0,1,.54,1.54,8.88,8.88,0,0,1,.22,1.87c0,.17,0,.41,0,.7s0,.52,0,.68a5.67,5.67,0,0,1-.22,1.61,2.07,2.07,0,0,1-.54.91,1.06,1.06,0,0,1-.78.28A2.06,2.06,0,0,1,318.76,199.2Zm.5-3.85a7.68,7.68,0,0,0,0-1,3.79,3.79,0,0,0-.26-1.19,1.62,1.62,0,0,0-.74-.87.75.75,0,0,0-.42-.12.47.47,0,0,0-.3.14,1.29,1.29,0,0,0-.18.33,3,3,0,0,0-.09.45c0,.16,0,.36,0,.58s0,.43,0,.61a5.25,5.25,0,0,0,.09.55,4.27,4.27,0,0,0,.18.54,2.22,2.22,0,0,0,.3.49,1.44,1.44,0,0,0,.42.36c.35.2.6.2.74,0A1.72,1.72,0,0,0,319.26,195.35Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 318.255px 194.798px; --darkreader-inline-fill: #e5e3df;"
                    id="elok5k2w70wef" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M321.93,198.33a1.81,1.81,0,0,1,.56-1.54,2.12,2.12,0,0,1,1.83,0l1.3.41a1.87,1.87,0,0,0-.15-.76,1.12,1.12,0,0,0-.5-.56.64.64,0,0,0-.39-.11.71.71,0,0,0-.21.08.24.24,0,0,1-.19.06.69.69,0,0,1-.21-.09l-1.41-.81a.54.54,0,0,1-.18-.21.56.56,0,0,1-.06-.31,1.52,1.52,0,0,1,.22-.69,1.32,1.32,0,0,1,.55-.47,1.68,1.68,0,0,1,.83-.12,2.56,2.56,0,0,1,1.05.37,4.75,4.75,0,0,1,1.18.94,5,5,0,0,1,.82,1.18,5.9,5.9,0,0,1,.49,1.35,7.19,7.19,0,0,1,.15,1.47v5.18a.37.37,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.4-.8a.63.63,0,0,1-.21-.26.87.87,0,0,1-.08-.38V202a1,1,0,0,1-.66.43,1.61,1.61,0,0,1-1-.3,3.3,3.3,0,0,1-.85-.69,4,4,0,0,1-.62-.92,5,5,0,0,1-.39-1.08A5.55,5.55,0,0,1,321.93,198.33Zm2.53,1.85a.87.87,0,0,0,.46.14.57.57,0,0,0,.36-.14.87.87,0,0,0,.25-.38,1.74,1.74,0,0,0,.09-.59l-1-.35a.63.63,0,0,0-.49,0,.45.45,0,0,0-.18.42,1,1,0,0,0,.14.54A1.11,1.11,0,0,0,324.46,200.18Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 324.764px 198.606px; --darkreader-inline-fill: #e5e3df;"
                    id="eldvp0f3qlz9" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M331.58,207.62a.9.9,0,0,0,.75.14c.21-.08.32-.32.32-.72v-1.19a1.7,1.7,0,0,1-.22.24.55.55,0,0,1-.29.16.86.86,0,0,1-.42,0,2.08,2.08,0,0,1-.61-.26,4,4,0,0,1-.95-.77,5.2,5.2,0,0,1-.77-1.16,7.64,7.64,0,0,1-.54-1.51,8.46,8.46,0,0,1-.23-1.82c0-.17,0-.38,0-.61s0-.43,0-.6a5.49,5.49,0,0,1,.23-1.57,2,2,0,0,1,.54-.88,1.09,1.09,0,0,1,.77-.27,2.25,2.25,0,0,1,.95.31,3.45,3.45,0,0,1,.63.47,3.65,3.65,0,0,1,.46.52,4.63,4.63,0,0,1,.31.51c.08.17.14.32.19.45v-.39a.38.38,0,0,1,.09-.28.18.18,0,0,1,.22,0l1.28.74a.57.57,0,0,1,.21.26.84.84,0,0,1,.09.37v8.32a4.19,4.19,0,0,1-.23,1.55,1.75,1.75,0,0,1-.62.86,1.39,1.39,0,0,1-1,.17,3.57,3.57,0,0,1-1.22-.46,5.48,5.48,0,0,1-1.41-1.15,6,6,0,0,1-.86-1.3,5.4,5.4,0,0,1-.43-1.24,5.14,5.14,0,0,1-.14-1,.31.31,0,0,1,.09-.28.16.16,0,0,1,.21,0l1.44.83a.86.86,0,0,1,.35.54,1.93,1.93,0,0,0,.24.53A1.32,1.32,0,0,0,331.58,207.62Zm-1-6.79a3,3,0,0,0,0,.4,3.88,3.88,0,0,0,0,.44,3.08,3.08,0,0,0,.27,1.14,1.65,1.65,0,0,0,.73.81c.3.18.53.18.69,0a1.13,1.13,0,0,0,.29-.71,4.87,4.87,0,0,0,0-1.08,3,3,0,0,0-.28-1,1.73,1.73,0,0,0-.7-.78c-.32-.19-.56-.2-.72,0A1.22,1.22,0,0,0,330.61,200.83Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 331.607px 203.744px; --darkreader-inline-fill: #e5e3df;"
                    id="el950afhxhf8e" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M337.61,206.44a2.48,2.48,0,0,0,.09.7,2.53,2.53,0,0,0,.24.55,1.87,1.87,0,0,0,.32.4,2.42,2.42,0,0,0,.35.26,1.33,1.33,0,0,0,.52.2.47.47,0,0,0,.33-.1.36.36,0,0,1,.18-.09.3.3,0,0,1,.19.06l1.44.83a.56.56,0,0,1,.24.52,1.23,1.23,0,0,1-.16.53,1.51,1.51,0,0,1-.52.55,1.54,1.54,0,0,1-.9.24,2.66,2.66,0,0,1-1.32-.43,5.21,5.21,0,0,1-1.28-1.06,6.12,6.12,0,0,1-.95-1.46,8.24,8.24,0,0,1-.57-1.78,10.41,10.41,0,0,1-.2-2.05,6.72,6.72,0,0,1,.2-1.72,2.55,2.55,0,0,1,.57-1.13,1.39,1.39,0,0,1,.95-.42,2.36,2.36,0,0,1,1.28.39,4.6,4.6,0,0,1,1.38,1.22,7.24,7.24,0,0,1,.93,1.62,8.63,8.63,0,0,1,.52,1.8,9.79,9.79,0,0,1,.16,1.74v.48a.37.37,0,0,1-.09.27.15.15,0,0,1-.21,0Zm1-2.7c-.31-.18-.55-.18-.71,0a1.37,1.37,0,0,0-.29.79l2,1.16a3.7,3.7,0,0,0-.29-1.13A1.77,1.77,0,0,0,338.61,203.74Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 338.605px 206.066px; --darkreader-inline-fill: #e5e3df;"
                    id="elgr2fzkm9mig" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M350.88,217.11a.37.37,0,0,1-.09.27.17.17,0,0,1-.21,0l-1.4-.81a.57.57,0,0,1-.21-.26.84.84,0,0,1-.09-.37v-4.33a3.6,3.6,0,0,0-.23-1.31,1.71,1.71,0,0,0-.73-.87c-.34-.19-.58-.18-.73,0a1.82,1.82,0,0,0-.23,1v4.33a.37.37,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.4-.8a.63.63,0,0,1-.21-.26.88.88,0,0,1-.09-.38v-8a.37.37,0,0,1,.09-.27.15.15,0,0,1,.21,0l1.35.77a.57.57,0,0,1,.21.26.84.84,0,0,1,.09.37v.4a1.19,1.19,0,0,1,.22-.23.6.6,0,0,1,.32-.15,1.1,1.1,0,0,1,.44,0,2.24,2.24,0,0,1,.58.25,4.05,4.05,0,0,1,1,.79,4.79,4.79,0,0,1,.76,1.15,6.77,6.77,0,0,1,.49,1.5,8.7,8.7,0,0,1,.18,1.84Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 347.93px 211.347px; --darkreader-inline-fill: #e5e3df;"
                    id="el92z38p2c6mm" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M357.9,216.53c0,.18,0,.4,0,.67s0,.48,0,.65a4.33,4.33,0,0,1-.24,1.39,2.06,2.06,0,0,1-.61.91,1.4,1.4,0,0,1-.94.3,2.53,2.53,0,0,1-1.23-.4,4.87,4.87,0,0,1-1.22-1,6.66,6.66,0,0,1-.94-1.39,8,8,0,0,1-.61-1.61,7,7,0,0,1-.24-1.68c0-.17,0-.39,0-.66s0-.48,0-.65a3.91,3.91,0,0,1,.23-1.4,2,2,0,0,1,.61-.9,1.43,1.43,0,0,1,1-.31,2.5,2.5,0,0,1,1.22.39,4.92,4.92,0,0,1,1.23,1,7.14,7.14,0,0,1,.94,1.4,7.63,7.63,0,0,1,.61,1.61A6.94,6.94,0,0,1,357.9,216.53Zm-4-1.1a3,3,0,0,0,.31,1.19,1.87,1.87,0,0,0,.71.78c.3.18.54.19.72,0a1.1,1.1,0,0,0,.3-.84,4.67,4.67,0,0,0,0-.57,5.41,5.41,0,0,0,0-.59,2.83,2.83,0,0,0-.3-1.19,1.82,1.82,0,0,0-.72-.78.59.59,0,0,0-.71,0,1.14,1.14,0,0,0-.31.84c0,.16,0,.35,0,.57S353.85,215.25,353.86,215.43Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 354.885px 215.449px; --darkreader-inline-fill: #e5e3df;"
                    id="el8ubxpz9h98t" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M361.55,220.26a1.84,1.84,0,0,0,.11.67.87.87,0,0,0,.37.43l.89.51a.57.57,0,0,1,.21.26.85.85,0,0,1,.09.38v1.72a.34.34,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.06-.61a3.87,3.87,0,0,1-.95-.78,5.08,5.08,0,0,1-.72-1.08,6.15,6.15,0,0,1-.47-1.33,6.72,6.72,0,0,1-.17-1.51v-2.87l-.82-.47a.57.57,0,0,1-.21-.26.84.84,0,0,1-.09-.37v-1.73a.34.34,0,0,1,.09-.27.15.15,0,0,1,.21,0l.82.48v-2.79a.35.35,0,0,1,.09-.27.17.17,0,0,1,.21,0l1.4.81a.57.57,0,0,1,.21.26.84.84,0,0,1,.09.37v2.79l1.25.72a.58.58,0,0,1,.22.26.87.87,0,0,1,.08.38v1.72a.38.38,0,0,1-.08.28.18.18,0,0,1-.22,0l-1.25-.72Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 360.825px 217.573px; --darkreader-inline-fill: #e5e3df;"
                    id="elrakb6t4uano" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M369,219.16l1.36.79a.6.6,0,0,1,.21.25.92.92,0,0,1,.09.38v1.73a.37.37,0,0,1-.09.27.17.17,0,0,1-.21,0l-1.36-.79v5.77a.34.34,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.4-.81a.52.52,0,0,1-.21-.26.84.84,0,0,1-.09-.37v-5.78l-.76-.44A.49.49,0,0,1,366,220a1,1,0,0,1-.08-.37v-1.73a.41.41,0,0,1,.08-.27.18.18,0,0,1,.22,0l.76.45v-.46a4,4,0,0,1,.18-1.3,1.5,1.5,0,0,1,.51-.74,1.09,1.09,0,0,1,.76-.2,2.28,2.28,0,0,1,1,.33l1.05.61a.51.51,0,0,1,.21.26.88.88,0,0,1,.09.38v1.72a.38.38,0,0,1-.09.28.16.16,0,0,1-.21,0l-1-.58c-.18-.1-.31-.1-.38,0a.84.84,0,0,0-.1.47Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 368.35px 221.623px; --darkreader-inline-fill: #e5e3df;"
                    id="eli5ho4hatg1" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M377.22,227.69c0,.17,0,.39,0,.66s0,.48,0,.65a4.43,4.43,0,0,1-.25,1.4,2.08,2.08,0,0,1-.61.9,1.37,1.37,0,0,1-.93.3,2.53,2.53,0,0,1-1.23-.4,4.87,4.87,0,0,1-1.23-1,6.62,6.62,0,0,1-.93-1.39,8,8,0,0,1-.86-3.28c0-.18,0-.4,0-.67s0-.48,0-.65a4.41,4.41,0,0,1,.23-1.4,2,2,0,0,1,.62-.9,1.46,1.46,0,0,1,.94-.31,2.5,2.5,0,0,1,1.23.39,4.92,4.92,0,0,1,1.23,1,7.45,7.45,0,0,1,.94,1.4A8.22,8.22,0,0,1,377,226,8.1,8.1,0,0,1,377.22,227.69Zm-4-1.11a2.87,2.87,0,0,0,.3,1.2,1.82,1.82,0,0,0,.72.78.62.62,0,0,0,.72,0,1.1,1.1,0,0,0,.3-.84c0-.16,0-.35,0-.57s0-.41,0-.59a2.86,2.86,0,0,0-.3-1.19,1.89,1.89,0,0,0-.72-.78c-.3-.17-.54-.19-.72,0a1.1,1.1,0,0,0-.3.84,4.88,4.88,0,0,0,0,.57A5.43,5.43,0,0,0,373.18,226.58Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 374.2px 226.601px; --darkreader-inline-fill: #e5e3df;"
                    id="el8cx7k750ipg" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M378.21,224.93a.38.38,0,0,1,.08-.28.16.16,0,0,1,.21,0l1.4.8a.63.63,0,0,1,.21.26.88.88,0,0,1,.09.38v4.32a3.73,3.73,0,0,0,.21,1.3,1.6,1.6,0,0,0,.7.85c.33.19.56.17.7-.05a2.13,2.13,0,0,0,.2-1.06v-4.32a.37.37,0,0,1,.09-.27.17.17,0,0,1,.21,0l1.4.81a.57.57,0,0,1,.21.26.85.85,0,0,1,.09.38v8a.37.37,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.29-.74a.57.57,0,0,1-.21-.26.84.84,0,0,1-.09-.37v-.4a1.27,1.27,0,0,1-.22.25.74.74,0,0,1-.31.14,1.12,1.12,0,0,1-.44,0,1.92,1.92,0,0,1-.59-.24,4.41,4.41,0,0,1-1.72-1.93,7.7,7.7,0,0,1-.63-3.33Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 381.108px 230.617px; --darkreader-inline-fill: #e5e3df;"
                    id="el3pkp6b9p3b5" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M391.21,240.39a.34.34,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.4-.81a.52.52,0,0,1-.21-.26.84.84,0,0,1-.09-.37v-4.32a3.65,3.65,0,0,0-.23-1.32,1.73,1.73,0,0,0-.73-.86c-.34-.2-.58-.19-.73,0a1.85,1.85,0,0,0-.23,1.05v4.32a.34.34,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.4-.81a.57.57,0,0,1-.21-.26.84.84,0,0,1-.09-.37v-8a.38.38,0,0,1,.09-.28.16.16,0,0,1,.21,0l1.35.77a.63.63,0,0,1,.21.26.88.88,0,0,1,.09.38v.39a1,1,0,0,1,.22-.23.79.79,0,0,1,.32-.15,1.12,1.12,0,0,1,.44,0,1.88,1.88,0,0,1,.58.24,4.05,4.05,0,0,1,1,.79,5,5,0,0,1,.76,1.15,6.77,6.77,0,0,1,.49,1.5,8.77,8.77,0,0,1,.18,1.84Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 388.259px 234.652px; --darkreader-inline-fill: #e5e3df;"
                    id="elrwnxxa6jnv" class="animable" data-darkreader-inline-fill=""></path>
                <path
                    d="M394.7,233.82a2.25,2.25,0,0,1,.57.43,3.84,3.84,0,0,1,.42.5,3.89,3.89,0,0,1,.3.5c.08.17.15.32.2.45v-3.64a.37.37,0,0,1,.09-.27.17.17,0,0,1,.21,0l1.4.81a.57.57,0,0,1,.21.26.85.85,0,0,1,.09.38v11.2a.34.34,0,0,1-.09.27.15.15,0,0,1-.21,0l-1.35-.78a.54.54,0,0,1-.21-.25.92.92,0,0,1-.09-.38v-.39a2.25,2.25,0,0,1-.21.24.75.75,0,0,1-.29.16.86.86,0,0,1-.42,0,2.11,2.11,0,0,1-.62-.26,4.13,4.13,0,0,1-.94-.77,5,5,0,0,1-.78-1.17,7.61,7.61,0,0,1-.54-1.53,9,9,0,0,1-.22-1.87c0-.18,0-.41,0-.7s0-.52,0-.69a5.73,5.73,0,0,1,.22-1.61,2.13,2.13,0,0,1,.54-.91,1.06,1.06,0,0,1,.78-.28A2,2,0,0,1,394.7,233.82Zm-.5,3.84a7.69,7.69,0,0,0,0,1,4,4,0,0,0,.26,1.19,1.67,1.67,0,0,0,.74.87.72.72,0,0,0,.42.13.48.48,0,0,0,.3-.15.88.88,0,0,0,.18-.33,2.63,2.63,0,0,0,.09-.44c0-.17,0-.36,0-.59s0-.43,0-.61-.05-.36-.09-.55a2.85,2.85,0,0,0-.18-.54,2.15,2.15,0,0,0-.3-.48,1.49,1.49,0,0,0-.42-.37c-.35-.2-.59-.19-.74,0A1.77,1.77,0,0,0,394.2,237.66Z"
                    style="fill: rgb(250, 250, 250); transform-origin: 395.206px 238.253px; --darkreader-inline-fill: #e5e3df;"
                    id="elsj0sggi1vti" class="animable" data-darkreader-inline-fill=""></path>
            </g>
        </g>
        <defs>
            <filter id="active" height="200%">
                <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
                <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                <feMerge>
                    <feMergeNode in="OUTLINE"></feMergeNode>
                    <feMergeNode in="SourceGraphic"></feMergeNode>
                </feMerge>
            </filter>
            <filter id="hover" height="200%">
                <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>
                <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                <feMerge>
                    <feMergeNode in="OUTLINE"></feMergeNode>
                    <feMergeNode in="SourceGraphic"></feMergeNode>
                </feMerge>
                <feColorMatrix type="matrix"
                    values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 ">
                </feColorMatrix>
            </filter>
        </defs>
        <defs>
            <clipPath id="freepik--clip-path--inject-18">
                <path
                    d="M256.53,361.25c5.06,29.3-14,57.06-42.59,62s-55.87-14.8-60.94-44.1c-4.26-24.66,9.1-45.21,30.49-54a61.87,61.87,0,0,1,19.73-4.49C229.07,319.07,251.87,334.32,256.53,361.25Z"
                    style="fill: none; --darkreader-inline-fill: none;" data-darkreader-inline-fill=""></path>
            </clipPath>
        </defs>
    </svg>
</div>
