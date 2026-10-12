
   
        
        <div class="menu">
           <h2 id="logo">
               <span class="brand-mark">C</span>
               <span class="brand-copy"><strong>CIREF</strong><small>Espace administrateur</small></span>
           </h2>
           <a href="{{route('admin.accueil')}}"><i class="fa fa-solid fa-house"></i>Accueil </a>
           <a href="{{route('utilisateur')}}"><i class="fa-solid fa-user"></i>Gerer utilisateur</a>
           <a href="{{route('admin.exploitant')}}"><i class="fa-solid fa-user"></i>Gerer exploitant</a>
           <a href="{{route('admin.autorisation_c')}}"><i class="fa-regular fa-newspaper"></i>Gerer autorisation de coupe</a>
           <a href="{{route('admin.produit')}}"><i class="fa-solid fa-truck"></i>Produit</a>
           <a href="{{route('log')}}" onclick="confirmdeconnecter(event)"><i class="fa fa-sign-out-alt"></i>Deconnecter</a>
        </div>