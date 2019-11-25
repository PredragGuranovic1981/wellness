<li class="nav-item active">
  <a class="nav-link" href="#">Provera profila <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="#">Zakazivanje termina</a>
</li>
<li class="nav-item">
  @if(auth()->user()->is_admin == 1)
  <a class="nav-link" href="/home">Admin</a>
  @else
  @endif
</li>
