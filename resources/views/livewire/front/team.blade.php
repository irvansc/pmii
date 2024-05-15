<div>

  <section id="team" class="team">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>Struktur Organisasi {{ WebInfo()->web_name }}</p>
      </div>

      <div class="row" data-aos="fade-left">
    @forelse ($userOrganizations as $user)


        <div class="col-lg-3 col-md-6">
          <div class="member" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="/storage/images/album/stu/{{ $user->img }}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>{{ $user->name }}</h4>
              <span>{{ $user->jabatan->name_jabatan }}</span>
              <div class="social">
                <a href="{{ $user->twitter }}"><i class="bi bi-twitter"></i></a>
                <a href="{{ $user->fb }}"><i class="bi bi-facebook"></i></a>
                <a href="{{ $user->ig }}"><i class="bi bi-instagram"></i></a>
                <a href="{{ $user->linkedin }}"><i class="bi bi-linkedin"></i></a>
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
        {{ $userOrganizations->links() }}
    </div>
    </div>
  </section>
</div>
