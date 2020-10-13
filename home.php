<!DOCTYPE html>
<html>

<head>
    <title>Public API</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='static/main.css?v=2'>
</head>



<body>

    <a href="https://github.com/vivirenremoto/free-public-api" target="_blank" id="github"><img
            src="static/img/github_badge.png"></a>

    <section class="jumbotron text-center">
        <div class="container">
            <h1>Public API</h1>

            <input id="search" placeholder="Search">

            <div id="filters">
                <div id="scroll">
                    <a href="#" class="btn btn-primary my-2 btn_filter">All</a>
                    <a href="#validate" class="btn btn-secondary my-2 btn_filter">Validate</a>
                    <a href="#generate" class="btn btn-secondary my-2 btn_filter">Generate</a>
                    <a href="#multimedia" class="btn btn-secondary my-2 btn_filter">Multimedia</a>
                    <a href="#map" class="btn btn-secondary my-2 btn_filter">Maps</a>
                    <a href="#currency" class="btn btn-secondary my-2 btn_filter">Currency</a>
                    <a href="#apps" class="btn btn-secondary my-2 btn_filter">Apps</a>
                    <a href="#seo" class="btn btn-secondary my-2 btn_filter">SEO</a>
                    <a href="#user" class="btn btn-secondary my-2 btn_filter">User</a>
                </div>
            </div>

        </div>
    </section>






    <div id="fullTable">
        <p align="center">Loading</p>
    </div>





    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="ModalBody">
                    <b>Request URL</b>
                    <textarea readonly="readonly" class="form-control" id="full_url" rows="3"></textarea>
                    <div id="params">
                        <br>
                        <b>GET Params</b>
                        <table class="table">
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn_code" type="button" class="btn btn-secondary">Source
                        code</button>
                    <button id="btn_test" type="button" class="btn btn-primary">Open URL</button>
                </div>
            </div>
        </div>
    </div>


    <script id="fullTable_template" type="text/html">
      <div class="row">
          {{#rows}}

          <div class="col-md-3 category category_{{category}}" data-format="{{format}}" data-title="{{category}} - {{title}}" data-url="{{url}}" data-api="{{api}}" data-format="{{format}}" onclick="showModal(this)">
            <div class="card text-white mb-4 shadow-sm">
                <div class="bd-placeholder-img card-img-top text-center category_icon"></div>
                <div class="card-body" style="padding-top:0;">
                <h5 class="card-title" style="text-align:center;font-weight:bold;">{{title}}</h5>
              </div>

            </div>
          </div>

          {{/rows}}
        </div>
    </script>




    <script src='https://cdnjs.cloudflare.com/ajax/libs/tabletop.js/1.5.1/tabletop.min.js'></script>
    <script type='text/javascript' src='https://cdn.rawgit.com/jlord/sheetsee.js/master/js/sheetsee.js'></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

    <script src="static/main.js?v=3"></script>
</body>

</html>