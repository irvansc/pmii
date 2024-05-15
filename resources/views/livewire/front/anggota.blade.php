<div>

    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Anggota</h2>
          <p>Anggota {{ WebInfo()->web_name }}</p>
        </div>

        <div class="row" data-aos="fade-left">
      @forelse ($users as $user)


          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="@if ($user->profile == null) /back/img/user/person.png @else {{ $user->profile->picture }} @endif" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>{{ $user->name }}</h4>
                <span>{{ $user->email }}</span>
                <div class="social">
                  <a href="{{ $user->profile->tw }}"><i class="bi bi-twitter"></i></a>
                  <a href="{{ $user->profile->fb }}"><i class="bi bi-facebook"></i></a>
                  <a href="{{ $user->profile->ig }}"><i class="bi bi-instagram"></i></a>
                  <a href="{{ $user->profile->in }}"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          @empty
      <span class="text-danger justify-content-center">Tidak ada data.</span>
          @endforelse

        </div>
        <div class="mt-3 mb-3 justify-content-center" style="display: flex; justify-content: center;">
            <style>
                .page-link{
                    color: black;
                }
                .page-item.active .page-link {
                    background-color: rgba(1, 4, 136, 0.9);
                    border-color: rgba(1, 4, 136, 0.9);
                    color: white;
                }
            </style>
            {{ $users->links() }}
        </div>
      </div>
    </section>
  </div>
