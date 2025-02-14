<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Puzzle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            color: #223344;
        }

        .scenario-step {
            display: inline-block;
            vertical-align: top;
            width: 250px;
            height: 250px;
            text-align: center;
            margin-right: 80px;
            position: relative;
            overflow: visible;
        }

        .scenario-step:after {
            content: "";
            display: block;
            position: absolute;
            top: 50%;
            left: 100%;
            width: 80px;
            height: 100px;
            margin-top: -50px;
            background: url(/Puzzle/assets/icons/right.png) no-repeat center;
            background-size: 40px 40px;
            opacity: 0.2;
        }

        .scenario-step:last-child,
        .scenario-step:nth-last-child(2) {
            overflow: hidden;
            margin-right: 20px;
        }

        .scenario-step-add {
            width: 50%;
            height: 50%;
            margin-top: 25%;
            border-radius: 20px;
            background: #d3d3d3 url(/Puzzle/assets/icons/plus.png) no-repeat center;
            background-size: 40px 40px;
            opacity: 0.2;
        }

        .scenario-step-add:hover {
            opacity: 1;
        }

        .scenario-step-images select {
            width: 80%;
            margin: 10px auto;
            font-size: 9pt;
            color: #99aabb;
            border-radius: 9px;
            border: 1px #f0f0f0 solid;
            background: #f5f5f5;
            padding: 2px 3px;
        }

        .scenario-step-image {
            width: 100%;
            height: 170px;
            background: no-repeat center;
            background-size: cover;
            border-radius: 10px;
            border: 1px #eeeeee solid;
        }

        .input-text,
        .input-text-sm,
        .input-text-lg {
            width: 100%;
            padding: 3px 5px;
            border-radius: 7px;
            border: 2px transparent solid;
            margin: 0;
            line-height: 125%;
        }

        .input-text-lg {
            font-size: 20pt;
            font-weight: 500;
            color: #334455;
        }

        .input-text-sm {
            font-size: 9pt;
            font-weight: 500;
            color: #667788;
        }

        .input-text:focus {
            outline: none;
            border-color: #3b82f6;
        }

        input[type="submit"] {
            position: fixed;
            right: 7px;
            top: 7px;
            z-index: 9999;
        }

        textarea {
            resize: none;
        }

        /* Shake animation */
        .shake {
            animation: shake 0.5s;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            20%, 60% {
                transform: translateX(-10px);
            }
            40%, 80% {
                transform: translateX(10px);
            }
        }
    </style>

</head>
<body class="d-flex flex-column h-100">
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
    </symbol>
</svg>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
            <use href="#circle-half"></use>
        </svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                <svg class="bi me-2 opacity-50" width="1em" height="1em">
                    <use href="#sun-fill"></use>
                </svg>
                Light
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                    <use href="#check2"></use>
                </svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                <svg class="bi me-2 opacity-50" width="1em" height="1em">
                    <use href="#moon-stars-fill"></use>
                </svg>
                Dark
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                    <use href="#check2"></use>
                </svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                <svg class="bi me-2 opacity-50" width="1em" height="1em">
                    <use href="#circle-half"></use>
                </svg>
                Auto
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                    <use href="#check2"></use>
                </svg>
            </button>
        </li>
    </ul>
</div>


<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/puzzle">Puzzle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="p-5">
        <form action="?" method="post">
            @foreach($data['scenarios'] as $scenarioNumber => $scenario)
                <div class="scenario px-5 my-5" data-scenario="{{ $scenarioNumber }}">
                    <div class="scenario-name mb-4">
                        <input type="text"
                               name="scenarios[{{ $scenarioNumber }}][name]"
                               value="{{ $scenario['name'] }}"
                               data-scenario-name="{{ $scenarioNumber }}"
                               class="input-text-lg">
                    </div>
                    <div class="scenario-steps">
                        @foreach($scenario['steps'] as $stepNumber => $step)
                            <div class="scenario-step mb-4"
                                 data-scenario-step
                                 data-step-number="{{ $stepNumber }}"
                                 data-scenario-number="{{ $scenarioNumber }}"
                            >
                                <div class="scenario-step-name">
                                <textarea type="text"
                                          name="scenarios[{{ $scenarioNumber }}][steps][{{ $stepNumber }}][name]"
                                          class="input-text-sm">{{ $step['name'] }}</textarea>
                                </div>
                                <div class="scenario-step-images">
                                    <div class="scenario-step-image"
                                         data-scenario-step-image-name="{{ $step['image']['name'] }}"
                                         data-scenario-step-image-url="{{ $step['image']['url'] }}"
                                         style="background-image:url({{ $step['image']['url'] }})"
                                    >
                                    </div>
                                    <div>
                                        <select
                                                data-image-selector=""
                                                name="scenarios[{{ $scenarioNumber }}][steps][{{ $stepNumber }}][image][name]"
                                        >
                                            @foreach($images as $imageUrl => $imageName)
                                                <option value="{{ $imageName }}"
                                                        @if($imageName == $step['image']['name']) selected @endif
                                                        data-image-url="{{ $imageUrl }}">
                                                    {{ $imageName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="scenario-step">
                            <div class="scenario-step-add"></div>
                        </div>
                    </div>
                </div>
                <div class="my-3">&nbsp;</div>
            @endforeach
            <div class="px-5 mx-2">
                <div class="btn btn-secondary" data-control-add-new-scenario>Add new scenario</div>
            </div>
            <input type="submit" value="Save" class="btn btn-primary">
        </form>

        <!-- Bootstrap Modal for Image Preview -->
        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="Image Preview" class="img-fluid" style="max-height: 90vh;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary prev-slide">Previous</button>
                        <button type="button" class="btn btn-primary next-slide">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-body-tertiary">
    <div class="container">
        <span class="text-body-secondary">Place sticky footer content here.</span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(function () {

        let Puzzle = {

            start: function () {
                Puzzle.initControls();
            },

            initControls: function () {

                $('.scenario-step-add').off('click').on('click', function () {
                    let newStep = $(this).closest('.scenario-step').prev().clone();
                    let scenarioNumber = parseInt(newStep.attr('data-scenario-number'));
                    let stepNumber = parseInt(newStep.attr('data-step-number'));
                    stepNumber++;
                    newStep
                        .attr('data-step-number', stepNumber);
                    newStep
                        .find('textarea')
                        .text('New step ' + stepNumber)
                        .attr('name', 'scenarios[' + scenarioNumber + '][steps][' + stepNumber + '][name]');
                    newStep
                        .find('[data-image-selector]')
                        .attr('name', 'scenarios[' + scenarioNumber + '][steps][' + stepNumber + '][image][name]');
                    $(this).closest('.scenario-step').before(newStep);
                    Puzzle.initControls();
                });

                $('[data-image-selector]').off('change').on('change', function () {
                    let image = $(this).find('option:selected').attr('data-image-url');
                    $(this).parent().prev().css('background-image', 'url(' + image + ')');
                });

                $('[data-control-add-new-scenario]').off('click').on('click', function () {
                    let newScenario = $('[data-scenario]').last().clone();
                    let scenarioNumber = parseInt(newScenario.attr('data-scenario'));
                    scenarioNumber++;
                    newScenario.attr('data-scenario', scenarioNumber);
                    newScenario
                        .find('[data-scenario-name]')
                        .attr('data-scenario-name', scenarioNumber)
                        .attr('name', 'scenarios[' + scenarioNumber + '][name]')
                        .val('New scenario');
                    newScenario.find('.scenario-step').filter(':gt(0)').remove();
                    Puzzle.resetStep(newScenario.find('.scenario-step').last(), scenarioNumber, 0);
                    $('[data-scenario]').last().after(newScenario);
                });

                $('[data-scenario-step-image-name]').off('click').on('click', function () {
                    Puzzle.openImagePopup($(this));
                });

                $('.next-slide').off('click').on('click', function () {
                    Puzzle.showNextImage();
                });

                $('.prev-slide').off('click').on('click', function () {
                    Puzzle.showPreviousImage();
                });
            },

            resetStep: function (stepElement, scenarioNumber, stepNumber) {
                stepElement
                    .attr('data-step-number', stepNumber);
                stepElement
                    .find('textarea')
                    .text('New step')
                    .attr('name', 'scenarios[' + scenarioNumber + '][steps][' + stepNumber + '][name]');
                stepElement
                    .find('[data-image-selector]')
                    .attr('name', 'scenarios[' + scenarioNumber + '][steps][' + stepNumber + '][image][name]');
            },

            openImagePopup: function (imageElement) {
                Puzzle.showPopupImage(imageElement);
                $('#imageModal').modal('show');

                $(document).off('keydown').on('keydown', function (e) {
                    if (e.key === 'ArrowLeft') {
                        Puzzle.showPreviousImage();
                    } else if (e.key === 'ArrowRight') {
                        Puzzle.showNextImage();
                    } else if (e.key === 'Escape') {
                        $('#imageModal').modal('hide');
                    }
                });

                $('#imageModal').on('hidden.bs.modal', function () {
                    $(document).off('keydown');
                });
            },

            showPopupImage: function (imageElement) {
                let scenarioNumber = imageElement.parent().parent().attr('data-scenario-number');
                let stepNumber = imageElement.parent().parent().prevAll().length;
                let src = imageElement.attr('data-scenario-step-image-url');
                $('#modalImage').attr('src', src);
                $('#imageModal').attr('data-scenario-number', scenarioNumber).attr('data-step-number', stepNumber);
            },

            showNextImage: function () {
                let scenarioNumber = $('#imageModal').attr('data-scenario-number');
                let scenarioStepNumber = $('#imageModal').attr('data-step-number');
                let stepElement = $('[data-scenario-step][data-scenario-number="' + scenarioNumber + '"]').eq(scenarioStepNumber);

                if (stepElement.nextAll().length < 2) {
                    $('#modalImage').addClass('shake'); // Apply shake animation
                    setTimeout(function () {
                        $('#modalImage').removeClass('shake');
                    }, 500); // Match with the shake animation duration
                    return;
                }
                Puzzle.showPopupImage(stepElement.next().find('[data-scenario-step-image-name]'));
            },

            showPreviousImage: function () {
                let scenarioNumber = $('#imageModal').attr('data-scenario-number');
                let scenarioStepNumber = $('#imageModal').attr('data-step-number');
                let stepElement = $('[data-scenario-step][data-scenario-number="' + scenarioNumber + '"]').eq(scenarioStepNumber);

                if (!stepElement.prevAll().length) {
                    $('#modalImage').addClass('shake'); // Apply shake animation
                    setTimeout(function () {
                        $('#modalImage').removeClass('shake');
                    }, 500); // Match with the shake animation duration
                    return;
                }
                Puzzle.showPopupImage(stepElement.prev().find('[data-scenario-step-image-name]'));
            }
        }

        Puzzle.start();

    });

</script>

</body>
</html>
