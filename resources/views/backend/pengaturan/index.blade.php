 <div class="container dashboard-umkm mt-4 mb-3">
     <h5 class="card-title">Pengaturan Data Akun</h5>
 </div>
 <div class="card-akun mb-3">
     <div class="card-body-akun pt-1">
         @auth
             <ul class="nav nav-tabs nav-tabs-bordered">
                 @if (Auth::user()->jabatan == 'umkm')
                     <li>
                         <a href="/pengaturan/profile"
                             class="nav-link {{ Request::is('pengaturan/profile') ? 'active' : '' }}"
                             style="font-weight: 800">
                             Data Profile
                         </a>
                     </li>
                     <li>
                         <a href="/pengaturan/edit_profile"
                             class="nav-link {{ Request::is('pengaturan/edit_profile') ? 'active' : '' }}"
                             style="font-weight: 800">
                             Edit Profile
                         </a>
                     </li>
                 @endif
                 @if (Auth::user()->jabatan == 'user')
                     <li>
                         <a href="/pengaturan" class="nav-link {{ Request::is('pengaturan') ? 'active' : '' }}"
                             style="font-weight: 800">
                             Data Akun
                         </a>
                     </li>
                     <li>
                         <a href="/pengaturan/edit" class="nav-link {{ Request::is('pengaturan/edit') ? 'active' : '' }}"
                             style="font-weight: 800">
                             Edit Profile
                         </a>
                     </li>
                 @endif
                 <li>
                     <a href="/pengaturan/ubah_password"
                         class="nav-link {{ Request::is('pengaturan/ubah_password') ? 'active' : '' }}"
                         style="font-weight: 800">
                         Ubah Password
                     </a>
                 </li>
             </ul>
         @else
             <p>Please log in to access your account settings.</p>
         @endauth
     </div>
 </div>
 <script>
     document.addEventListener('DOMContentLoaded', () => {
         const navLinks = document.querySelectorAll('.nav-link');

         navLinks.forEach(link => {
             link.addEventListener('click', function() {
                 navLinks.forEach(navLink => {
                     navLink.classList.remove('active');
                 });
                 this.classList.add('active');
             });
         });
     });
 </script>
