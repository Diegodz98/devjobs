<template>
  <span
    @click="cambiarEstado"
    :key="estadoVacanteData"
    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full "
    :class="claseEstadoVacante()"
  >
    {{estadoVacante}}
  </span>
</template>

<script>
export default {
  props: ["estado", "vacanteId"],
  mounted() {
    this.estadoVacanteData = Number(this.estado);
  },
  data: function () {
    return {
      estadoVacanteData: null,
    };
  },
  methods: {
    claseEstadoVacante(){
      console.log(this.estadoVacanteData);

        return this.estadoVacanteData === 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
    },
    cambiarEstado() {
      if (this.estadoVacanteData === 1) {
        this.estadoVacanteData = 0;
      } else {
        this.estadoVacanteData = 1;
      }
      const params= {
          estado: this.estadoVacanteData
      }
      axios
        .post('/vacantes/' + this.vacanteId, params)
        .then(response => console.log(response))
        .catch(error => console.log(error))
    },
  },
  computed:{
      estadoVacante(){
          return this.estadoVacanteData === 1 ? 'Activo' : 'Inactivo' 
      }
  }
};
</script>

<style>
</style>