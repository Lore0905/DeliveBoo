<template>
    <section class="selection">
    <div class="container">

        <!-- {{-- Titolo --}} -->
        <div class="selection-title">
            La selezione di Deliveboo
        </div>

        <!-- {{-- Riga superiore --}} -->
        <div class="row py-4">
            <div class="col-6 col-lg-4">
                <div class="box">
                    <!-- {{-- Immagine --}} -->
                    <div class="background comfort">
                        <!-- {{-- Scritta al centro --}} -->
                        <span>
                            Comfort food
                        </span>
                    </div>
                    <!-- {{-- Descrizione --}} -->
                    <div class="description">
                        I grandi classici che scaldano il cuore, perfetti in ogni momento.
                    </div>
                    <!-- {{-- Link --}} -->
                    <div class="link">
                        <a href="#">
                            Scopri Comfort food
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-8">
                <div class="box">
                    <!-- {{-- Immagine --}} -->
                    <div class="background dessert">
                        <!-- {{-- Scritta al centro --}} -->
                        <span>
                            Dolci e dessert
                        </span>
                    </div>
                    <!-- {{-- Descrizione --}} -->
                    <div class="description">
                        Dolci piaceri per rendere la giornata ancora più gustosa.
                    </div>
                    <!-- {{-- Link --}} -->
                    <div class="link">
                        <a href="#">
                            Scopri Dolci e dessert
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- {{-- Riga inferiore --}} -->
        <div class="row">
            <div class="col-6 col-lg-8">
                <div class="box">
                    <!-- {{-- Immagine --}} -->
                    <div class="background share">
                        <!-- {{-- Scritta al centro --}} -->
                        <span>
                            Perfetti da condividere
                        </span>
                    </div>
                    <!-- {{-- Descrizione --}} -->
                    <div class="description">
                        Serve una scusa per stare insieme? Ordina dai ristoranti che trasformeranno la tua serata in una vera festa.
                    </div>
                    <!-- {{-- Link --}} -->
                    <div class="link">
                        <a href="#">
                            Scopri Perfetti da condividere
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4">
                <div class="box">
                    <!-- {{-- Immagine --}} -->
                    <div class="background exclusive">
                        <!-- {{-- Scritta al centro --}} -->
                        <span>
                            Esclusiva Deliveboo
                        </span>
                    </div>
                    <!-- {{-- Descrizione --}} -->
                    <div class="description">
                        I più famosi, i più buoni, i preferiti. Quelli che trovi solo su Deliveboo.
                    </div>
                    <!-- {{-- Link --}} -->
                    <div class="link">
                        <a href="#">
                            Scopri Esclusiva Deliveboo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
    export default {
        name: 'Selection'
    }
</script>

<style lang="scss" scoped>
@import '../style/variables.scss';
@import '../style/generals.scss';

.selection{
    padding: 20px 0;

    .selection-title{
        font-size: $components_title;
        font-weight: 600;
        font-style: italic;
        color: $secondary_color;
    }

    .row{

        .box{

            .comfort{
                background-image: url('https://www.biochetasi.it/wp-content/uploads/2019/09/I-bambini-e-il-cibo-spazzatura.-Meglio-non-esagerare-1-biochetasi-1000x600.jpg');
            }

            .dessert{
                background-image: url('https://www.innaturale.com/wp-content/uploads/2021/11/Cibo-spazzatura-junk-food-emissioni-Co2.jpg');
            }

            .share{
                background-image: url('https://itacanotizie.it/wp-content/uploads/2020/03/COME-CONSERVARE-IL-CIBO-IN-ESTATE.jpg');
            }

            .exclusive{
                background-image: url('https://www.focus.it/images/2020/11/10/cibo_1020x680.jpg');
            }

            .background{
                background-repeat: no-repeat;
                background-size: cover;
                object-fit: cover;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 50px 70px;
                text-align: center;

                span{
                    color: white;
                    font-size: 25px;
                    font-weight: 600;
                }
            }

            .description{
                color: $secondary_color;
                padding: 10px 0;
            }

            .link{
                a{
                    color: $primary_color;
                    text-decoration: none;
                }
            }
        }
    }
}
</style>