<template>
  <div>
    <ul class="flex flex-wrap justify-center">
      <li
        class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
        :class="verificarClaseActiva(skill)"
        v-for="(skill, i) in this.skills"
        v-bind:key="i"
        @click="activar($event)"
      >{{ skill }}</li>
    </ul>

    <input type="hidden" name="skills" id="skills" />
  </div>
</template>

<script>
export default {
  props: ["skills", "oldskills"],
  mounted() {
    document.querySelector("#skills").value = this.oldskills;
    console.log(this.oldskills);
  },
  created: function () {
    if (this.oldskills) {
      const skillsArray = this.oldskills.split(",");
      skillsArray.forEach((skill) => this.habilidades.add(skill));
    }
  },
  data: function () {
    return {
      habilidades: new Set(),
    };
  },
  methods: {
    activar(e) {
      if (e.target.classList.contains("bg-teal-400")) {
        e.target.classList.remove("bg-teal-400");
        this.habilidades.delete(e.target.textContent);
      } else {
        e.target.classList.add("bg-teal-400");
        this.habilidades.add(e.target.textContent);
      }
      //agrgar las habilidades
      const strHabilidades = [...this.habilidades];
      document.querySelector("#skills").value = strHabilidades;
    },
    verificarClaseActiva(skill) {
      return this.habilidades.has(skill) ? "bg-teal-400" : "";
    },
  },
};
</script>

<style>
</style>