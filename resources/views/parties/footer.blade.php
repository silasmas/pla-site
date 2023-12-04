<footer>
    <div class="pb-5 container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6">
          <div class="text-star">
            <a href="#" class="logo">
              <img src="{{ asset('assets/images/PLA_logo1.png') }}" alt="">
            </a>
            <p>
                @if (!empty($accueil->txtfooter))
                    {!! $accueil->txtfooter !!}
                 @endif
            </p>
            @if (!empty($accueil->facebook))
            <a href="{{ $accueil->facebook }}" class="icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            @endif
            @if (!empty($accueil->tweeter))
            <a href="{{ $accueil->tweeter }}" class="icon">
              <i class="fab fa-twitter"></i>
            </a>
            @endif
            @if (!empty($accueil->linkedin))
            <a href="{{ $accueil->linkedin }}" class="icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
            @endif
            @if (!empty($accueil->google))
            <a href="{{ $accueil->google }}" class="icon">
              <i class="fab fa-google-plus"></i>
            </a>
            @endif
          </div>
        </div>
        <div class="col-lg-6 col-md-6 text-center">
          <div class="text-white text-star">
            <h4>@lang('info.footer.contact')</h4>
            @if (!empty($accueil->adresse))
            <p>
              <i class="fas fa-map-marker"></i>
              {{ $accueil->adresse }}
            </p>
            @endif
            @if (!empty($accueil->email))
            <p>
              <i class="fas fa-envelope"></i>
              {{ $accueil->email }}
            </p>
            @endif
            @if (!empty($accueil->telphone))
            <p>
              <i class="fas fa-phone"></i>
              {{ $accueil->telphone }}
            </p>
            @endif
          </div>
        </div>
        <div class="mr-5 col-lg-3 col-md-6">
          <div class="text-white text-star">
            <h4>@lang('info.footer.menu')</h4>
            <div class="row g-lg-3 g-3">
                @if(!empty($accueil->p1))
                <div class="col-lg-4 col-6">
                    <div class="card">
                      <a href="{{ $accueil->l1 }}" target="_blank" rel="">
                       <img src="{{ asset('storage/'. $accueil->p1) }}" alt="">
                      </a>

                    </div>
                </div>
                @endif
                @if(!empty($accueil->p2))
                <div class="col-lg-4 col-6">
                    <div class="card">
                      <a href="{{ $accueil->l2 }}" target="_blank" rel="">
                       <img src="{{ asset('storage/'. $accueil->p2) }}" alt="">
                      </a>

                    </div>
                  </div>
                @endif
                @if(!empty($accueil->p3))
                <div class="col-lg-4 col-6">
                    <div class="card">
                      <a href="{{ $accueil->l3 }}" target="_blank" rel="">
                      <img src="{{ asset('storage/'. $accueil->p3) }}" alt="">
                      </a>

                    </div>
                  </div>
                @endif
                @if(!empty($accueil->p4))
                <div class="col-lg-4 col-6">
                    <div class="card">
                      <a href="{{ $accueil->l4}}" target="_blank" rel="">
                        <img src="{{ asset('storage/'. $accueil->p4) }}" alt="">
                      </a>

                    </div>
                  </div>
                @endif

            </div>
          </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6">
          <div class="text-white text-star">
            <h4>NewsLetter</h4>
            <p>@lang('info.footer.msgNewsletter')</p>
            <div class="col-lg-12">
            </div>
            <div class="col-lg-10">
            </div>
            <form action="" id="formnewsletter" data-parsley-validate>
                @csrf
              <div class="form-group row g-3">
                <div class="col-lg-12">
                  <input type="email" name='emailnewsletter' class="form-control" placeholder="Veuillez inserez votre Email...."
                  required aria-required="true" data-parsley-minlength="2">
                </div>
                <div class="col-lg-12">
                  <button class="btn" id="btNewsletter">@lang('info.footer.btnSouscription') <i class="fas fa-paper-plane ps-1"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div> --}}
    </div>
  </footer>
  <div class="bottombar">
    <div class="text-center">
      <p class="mb-0" style="opacity: .5;">Copyright © Pathy Liongo & Associates 2021</p>
      <p class="mb-0" style="font-size: 14px;"><small>Designed By <a href="https://www.silasmas.com" target="_blank">SilasDev</a></small></p>
    </div>
  </div>
