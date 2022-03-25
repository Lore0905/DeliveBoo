<template>
    <section class="work">
    <div class="container">
        <!-- {{-- Titolo --}} -->
        <div class="work-title">
            Lavora con Deliveboo
        </div>

        <!-- {{-- Riga --}} -->
        <div class="row">

            <!-- {{-- Rider --}} -->
            <div class="col-sm-12 col-md-12 col-lg-4 py-4">
                <div class="box">
                    <!-- {{-- Foto --}} -->
                    <div class="top">
                        <img src="https://static.open.online/wp-content/uploads/2019/09/riders_open.jpg" alt="">
                    </div>
                    <!-- {{-- Parte scritta --}} -->
                    <div class="bottom red">
                        <div class="title">
                            Rider
                        </div>
                        <div class="description">
                            Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi per te.
                        </div>
                        <!-- {{-- Bottone --}} -->
                        <div>
                            <a class="m_button" href="#">
                                Unisciti a noi
                            </a>
                        </div>
                    </div>
                </div>    
            </div>

            <!-- {{-- Ristoranti --}} -->
            <div class="col-sm-12 col-md-12 col-lg-4 py-4">
                <div class="box">
                    <!-- {{-- Foto --}} -->
                    <div class="top">
                        <img src="https://www.investireoggi.it/news/wp-content/uploads/sites/12/2021/11/Nuovi-ristoranti-dItalia-ecco-la-top-ten-secondo-gli-esperti-di-The-Fork.jpeg" alt="">
                    </div>
                    <!-- {{-- Parte scritta --}} -->
                    <div class="bottom orange">
                        <div class="title">
                            Ristoranti
                        </div>
                        <div class="description">
                            Diventa partner di Deliveboo e raggiungi sempre più clienti. Ci occupiamo noi della consegna, così che la tua unica preoccupazione sia continuare a preparare il miglior cibo.
                        </div>
                        <!-- {{-- Bottone --}} -->
                        <div>
                            <a class="m_button" href="#">
                                Diventa nostro partner
                            </a>
                        </div>
                    </div>
                </div>    
            </div>

            <!-- {{-- Lavora con noi --}} -->
            <div class="col-sm-12 col-md-12 col-lg-4 py-4">
                <div class="box">
                    <!-- {{-- Foto --}} -->
                    <div class="top">
                        <img src="https://www.lago.it/wp-content/uploads/2015/03/luoghi-di-lavoro-accoglienti_L2R3272_01.jpg" alt="">
                    </div>
                    <!-- {{-- Parte scritta --}} -->
                    <div class="bottom gray">
                        <div class="title">
                            Lavora con noi
                        </div>
                        <div class="description">
                            La nostra missione è trasformare il modo in cui le persone mangiano. È un obiettivo ambizioso, come noi, e ci servono persone che ci aiutino a raggiungerlo.
                        </div>
                        <!-- {{-- Bottone --}} -->
                        <div>
                            <a class="m_button" href="#">
                                Scopri di più
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
    export default {
        name: 'Work'
    }
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';

.work{
    padding: 30px 0;

    img{
        width: 100%;
        height: 100%;
    }

    .work-title{
        color: $secondary_color;
        font-size: $components_title;
        font-weight: 600;
        font-style: italic;
    }

    .row{
        
        .box{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;

            .red{
                background-color: #fe483b;
            }

            .orange{
                background-color: #ff8100;
            }

            .gray{
                background-color: #bac3c3;
            }

            .bottom{
                color: white;
                padding: 40px 40px;
                height: 100%;

                .title{
                    font-size: 35px;
                    font-weight: 600;
                    padding-bottom: 15px;
                }

                .description{
                    padding-bottom: 30px;
                }
            } 
        }
    }
}
</style>