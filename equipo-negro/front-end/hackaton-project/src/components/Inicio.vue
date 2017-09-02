<template>
  <main class="inicio">
    <header class="page-header">
      <router-link to="/" class="btn btn-red">VOLVER</router-link>
      <h3>Bienvenidos al simulador virtual de SEGURIDAD VIAL.</h3>
      <p>El propósito de este sistema es concientizar y educar a las personas acerca de situaciones comunes de SEGURIDAD VIAL.</p>
    </header>
    <div class="page-content">
      <div id="map"></div>
    </div>
    <div class="resultados" v-if="done.length > 0">
      <header class="resultados__header">
        <h2>Resultados</h2>
      </header>
      <ul class="resultados-list">
        <li v-for="(item, index) in done" class="resultados-list__item">
          <h3><strong>{{ (index + 1) }} - </strong>{{ item.name }}</h3>
          <h4 v-if="item.state === 'success'" class="green">Respuesta: Correcta</h4>
          <h4 v-if="item.state === 'fail'" class="red">Respuesta: Incorrecta</h4>
          <p>{{ getAnswer(item, item.state) }}</p>
        </li>
      </ul>
      <footer class="resultados__footer">
        <h3>Puntaje: {{ correctas.length / done.length * 100 }}% de respuestas correctas.</h3>
      </footer>
    </div>
  </main>
</template>

<script>
import GoogleMapsLoader from 'google-maps';

export default {
  name: 'Inicio',
  computed: {
    puntos() {
      return this.$store.state.puntos;
    },
    correctas() {
      return this.puntos.filter((punto) => {
        return punto.state === 'success';
      });
    },
    done() {
      return this.puntos.filter((punto) => {
        return punto.state !== 'pending';
      });
    },
  },
  methods: {
    getAnswer(item, itemState) {
      let returnOption;
      if (itemState === 'success') {
        returnOption = item.options.filter((option) => {
          return option.name === item.correctOption.name;
        })[0];
        return `Vos y el ${returnOption.probs} de la gente respondio esta pregunta correctamente.`;
      }
      returnOption = item.options.filter((option) => {
        return option.name !== item.correctOption.name;
      })[0];
      return `Vos y el ${returnOption.probs} de la gente respondio esta pregunta incorrectamente.`;
    },
  },
  mounted() {
    GoogleMapsLoader.KEY = 'AIzaSyDhBvBDCDM1cHWB7-vzSRZP7odkeU0SRGg';
    GoogleMapsLoader.LIBRARIES = ['geometry', 'places'];

    GoogleMapsLoader.load((google) => {
      const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: { lat: -27.4515035, lng: -58.9836923 },
      });

      this.puntos.map((punto) => {
        let image;
        switch (punto.state) {
          case 'pending':
            image = '/static/images/icons/icon-location-yellow.svg';
            break;
          case 'fail':
            image = '/static/images/icons/icon-locaction-red.svg';
            break;
          case 'success':
            image = '/static/images/icons/icon-location-green.svg';
            break;
          default:
            image = '/static/images/icons/icon-location-yellow.svg';
        }
        const marker = new google.maps.Marker({
          position: punto.coords,
          map,
          icon: image,
        });
        marker.addListener('click', () => {
          this.linkTo(`/opcion/${punto.link}`);
        });
        return punto;
      });
    });
  },
};
</script>

<style lang="scss">
  #map{
    width: 100%;
    height: 400px;
  }
</style>
