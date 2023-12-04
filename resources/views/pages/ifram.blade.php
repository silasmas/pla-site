<div class="tab-content pt-2" id="borderedTabJustifiedContent" style="height:400px">
    <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container">

            {{-- <iframe frameborder="0" scrolling="no" onload="resizeIframe(this)" style=" top: 0;left: 0;width: 100%;height: 100%;"
             src="{{ asset('video/BIOGRAPHIE_Antoine.htm&embedded=true') }}" height="400px" ; width="400px">

            </iframe> --}}
            <iframe src="https://view.officeapps.live.com/op/embed.aspx?src=http%3A%2F%2Fhomepages.inf.ed.ac.uk%2Fneilb%2FTestWordDoc.doc" frameborder="no" style="width:100%;height:500px"></iframe>
            <div>
                <label for="iframe-height">Défilement:</label>
                <input type="range" id="iframe-height" min="500" max="5000" step="10" value="500" onchange="adjustIframeHeight(this.value)">

            </div>

        </div>
    </div>

    {{-- <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="block_9" style="background: #fff;">
            <div class="container-fluid px-lg-5">
                <div class="row g-4">
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-star">
                                    <h1> </h1>
                                    <h3>{{count($avocat['publications'])}} Publication(s) </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row g-lg-1 pub-container aos-init "    style="position: relative; height: 494px;">

                            @foreach ($avocat['publications'] as $publication )
                            <div class="col-lg-6 col-md-6 portfolio-item 9" style="position: absolute; left: 0px; top: 0px;">
                                <div class="card">
                                    <div class="category">
                                        @if ($currentLocale=="fr")
                                                    {{$publication['titre_fr']}}
                                                    @endif

                                                    @if ($currentLocale=="en")
                                                    {{$publication['titre_en']}}
                                                    @endif
                                    </div>
                                    <div class="card-img">
                                        <div class="content-img">
                                            <img src="{{$url_fichier_pub.''.$publication["photo"]}}" alt="img">
                                        </div>
                                        <div class="date">
                                            <span class="text-white" >{{ \Carbon\Carbon::parse($publication['created_at'])->format('d M') }}</span>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <h2>
                                            @if ($currentLocale=="fr")
                                            <span>{{$publication['titre_fr']}}</span>
                                            @endif

                                            @if ($currentLocale=="en")
                                            <span>{{$publication['titre_en']}}</span>
                                            @endif
                                        </h2>

                                        <p>
                                            @if ($currentLocale=="fr")
                                                    <span>{{$publication['sous_titre_fr']}}</span>
                                                    @endif

                                                    @if ($currentLocale=="en")
                                                    <span>{{$publication['sous_titre_en']}}</span>
                                                    @endif
                                        </p>
                                        <a href="{{route('publication.detail',$publication['id'])}}">
                                            @lang("public.read more")<i class="fas fa-angle-right"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
</div>
