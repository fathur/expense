@extends('template')

@push('styles')
    <link rel="stylesheet"
          href="{{asset('/components/pc-bootstrap4-datetimepicker/css/bootstrap-datetimepicker.css')}}">
@endpush

@push('style')
    <style>

        .wh-helper {
            margin-top: 6px;
        }

        #who-text {
            width: 45px;
        }

        #how-much-text {
            width: 80px;
        }

        #when-text {
            width: 85px;
        }

        #why-text {
            width: 48px;

        }

        .textarea {
            border: 1px solid black;
            padding: 5px 15px;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="status-wrapper">

                <div class="status">


                    <form action="{{route('story.store')}}" class="form-inline" method="post">
                        {{csrf_field()}}

                        <div class="form-group mb-2">
                            <input type="text" readonly class="form-control-plaintext form-control-sm wh-helper"
                                   id="who-text"
                                   value="Aku di" title="who">
                        </div>

                        <div class="form-group">
                            {{--<label for="where">Dimana?</label>--}}
                            <input type="text" id="where" title="where" name="where" placeholder="dimana?"
                                   class="form-control form-control-sm" aria-describedby="whereHelp">&nbsp;
                        </div>

                        <div class="form-group">
                            {{--<label for="what">Ngapain?</label>--}}
                            <input type="text" id="what-activity" title="what-activity" name="what-activity"
                                   placeholder="ngapain?"
                                   class="form-control form-control-sm" aria-describedby="whatActivityHelp">&nbsp;
                        </div>

                        <div class="form-group">
                            {{--<label for="what">Ngapain?</label>--}}
                            <input type="text" id="what-object" title="what-object" name="what-object"
                                   placeholder="apa?"
                                   class="form-control form-control-sm" aria-describedby="whatObjectHelp">&nbsp;
                        </div>


                        <div class="form-group mb-2">
                            <input type="text" readonly class="form-control-plaintext form-control-sm wh-helper"
                                   id="how-much-text"
                                   value="sebesar Rp." title="who">
                        </div>

                        <div class="form-group">
                            {{--<label for="how-much">Berapa?</label>--}}
                            <input type="text" id="how-much" title="how-much" name="how-much" placeholder="berapa?"
                                   class="form-control form-control-sm" aria-describedby="howMuchHelp">&nbsp;
                        </div>

                        <div class="form-group mb-2">
                            <input type="text" readonly class="form-control-plaintext form-control-sm wh-helper"
                                   id="when-text"
                                   value="pada tanggal" title="when-text">
                        </div>

                        <div class="form-group">
                            {{--<label for="when">Kapan?</label>--}}
                            <input type="text" id="when" title="when" name="when" placeholder="kapan?"
                                   class="form-control form-control-sm" aria-describedby="whenHelp">&nbsp;
                        </div>

                        <div class="form-group mb-2">
                            <input type="text" readonly class="form-control-plaintext form-control-sm wh-helper"
                                   id="why-text"
                                   value="karena" title="why-text">
                        </div>

                        <div class="form-group">
                            {{--<label for="why">Kenapa?</label>--}}
                            <input type="text" id="why" title="why" name="why" placeholder="kenapa?"
                                   class="form-control form-control-sm" aria-describedby="whyHelp">&nbsp;
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" readonly class="form-control-plaintext form-control-sm wh-helper"
                                   id="dot-text"
                                   value="." title="dot-text">
                        </div>

                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>

                <div class="example">
                    <div class="small">Contoh:
                        <ul>
                            <li>
                                Aku di Bandara Soekarno Hatta mengeluarkan uang dari dompet untuk membeli kopi Starbucks sebesar Rp.50.000 pada tanggal 17
                                Agustus 2018 10:23:12 karena haus.
                            </li>

                            <li>
                                Aku di kantor mendapatkan uang dari Sehati ke dompet sebesar Rp.4.000.000 pada tanggal 25 April 2018 karena gajian.
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="action">

                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <ol class="list-unstyled">
            @foreach($stories as $story)
                <li>
                    <div class="alert alert-primary" role="alert">
                    Aku di {{$story->location}} mengeluarkan uang untuk {{$story->activity->name}} {{$story->object}} sebesar {{$story->money}} pada tanggal {{$story->datetime}}
                    karena {{$story->cause}}.
                    </div>
                </li>
            @endforeach
            </ol>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('components/moment/moment.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWee598oMXaSBm9ZumCl1_WTS54T5Lmbo&libraries=places&callback=initMap"
        async defer></script>
    <script
        src="{{asset('/components/pc-bootstrap4-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

@endpush

@push('script')

    {{--Google Place API: AIzaSyAWee598oMXaSBm9ZumCl1_WTS54T5Lmbo--}}
    <script>
        $.fn.textWidth = function (text, font) {

            if (!$.fn.textWidth.fakeEl) $.fn.textWidth.fakeEl = $('<span>').hide().appendTo(document.body);

            $.fn.textWidth.fakeEl.text(text || this.val() || this.text() || this.attr('placeholder')).css('font', font || this.css('font'));

            return $.fn.textWidth.fakeEl.width();
        };

        $('.width-dynamic').on('input', function () {
            var inputWidth = $(this).textWidth();
            $(this).css({
                width: inputWidth + 10
            })
        }).trigger('input');


        function inputWidth(elem, minW, maxW) {
            elem = $(this);
            console.log(elem)
        }

        var targetElem = $('.width-dynamic');

        inputWidth(targetElem);


        // Googla maps place
        function initMap() {
            var input = document.getElementById('where');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.setFields(
                ['address_components', 'geometry', 'icon', 'name']
            );
        }

        $(function () {
            $('#when').datetimepicker();
        });
    </script>
@endpush
