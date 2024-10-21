<div class="container-cards">
    <?PHP foreach($productos as $p){?>
    <div class="card">
        <img class="card-img" src="../public/assets/img/<?PHP echo $p->getImg()?>" alt="">
        <div class="card-content">
            <h4 class="card-content-title"><?PHP echo $p->getNombre()?></h4>
            <p class="card-content-des"><?PHP echo $p->getDescripcion()?></p>
            <p class="card-content-valor">Precio: <?PHP echo $p->getValor()?></p>
        </div>
    </div>
    <?PHP }?>
</div>


