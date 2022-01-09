<template>
  <div>
    <h1>Character List</h1>

    <div
      v-if="isLoading"
      class="alert alert-info">Loading...</div>
    <div
      v-if="deletedItem"
      class="alert alert-success">{{ deletedItem['@id'] }} deleted.</div>
    <div
      v-if="error"
      class="alert alert-danger">{{ error }}</div>

    <p>
      <router-link
        :to="{ name: 'CharacterCreate' }"
        class="btn btn-primary">Create</router-link>
    </p>

    <table class="table table-responsive table-striped table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>name</th>
          <th>img</th>
          <th>atk</th>
          <th>def</th>
          <th>hp</th>
          <th>er</th>
          <th>em</th>
          <th>cr</th>
          <th>cd</th>
          <th>ed</th>
          <th>talentE</th>
          <th>talentQ</th>
          <th>talentAA</th>
          <th>weapon</th>
          <th>team</th>
          <th>videoUrl</th>
          <th>banner</th>
          <th>element</th>
          <th>weaponRefine</th>
          <th>bannerBg</th>
          <th>rarity</th>
          <th>buff</th>
          <th>artifact</th>
          <th colspan="2"></th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in items"
          :key="item['@id']">
          <th scope="row">
            <router-link
              v-if="item"
              :to="{name: 'CharacterShow', params: { id: item['@id'] }}">
              {{ item['@id'] }}
            </router-link>
          </th>
        <td>
            {{ item['name'] }}
        </td>
        <td>
            {{ item['img'] }}
        </td>
        <td>
            {{ item['atk'] }}
        </td>
        <td>
            {{ item['def'] }}
        </td>
        <td>
            {{ item['hp'] }}
        </td>
        <td>
            {{ item['er'] }}
        </td>
        <td>
            {{ item['em'] }}
        </td>
        <td>
            {{ item['cr'] }}
        </td>
        <td>
            {{ item['cd'] }}
        </td>
        <td>
            {{ item['ed'] }}
        </td>
        <td>
            {{ item['talentE'] }}
        </td>
        <td>
            {{ item['talentQ'] }}
        </td>
        <td>
            {{ item['talentAA'] }}
        </td>
        <td>
            <template>
              <div
                v-if="Array.isArray(item['weapons'])">
                <router-link
                  v-for="link in item['weapons']"
                  :key="link['@id']"
                  :to="{ name: 'WeaponShow', params: { id: link['@id'] } }">
                  {{ link['@id'] }}
                </router-link>
              </div>
              <router-link
                v-else
                :to="{ name: 'WeaponShow', params: { id: item['weapons'] } }">
                {{ item['weapons'] }}
              </router-link>
            </template>
        </td>
        <td>
            <template>
              <div
                v-if="Array.isArray(item['teams'])">
                <router-link
                  v-for="link in item['teams']"
                  :key="link['@id']"
                  :to="{ name: 'TeamShow', params: { id: link['@id'] } }">
                  {{ link['@id'] }}
                </router-link>
              </div>
              <router-link
                v-else
                :to="{ name: 'TeamShow', params: { id: item['teams'] } }">
                {{ item['teams'] }}
              </router-link>
            </template>
        </td>
        <td>
            {{ item['videoUrl'] }}
        </td>
        <td>
            {{ item['banner'] }}
        </td>
        <td>
            <template>
              <div
                v-if="Array.isArray(item['elements'])">
                <router-link
                  v-for="link in item['elements']"
                  :key="link['@id']"
                  :to="{ name: 'ElementShow', params: { id: link['@id'] } }">
                  {{ link['@id'] }}
                </router-link>
              </div>
              <router-link
                v-else
                :to="{ name: 'ElementShow', params: { id: item['elements'] } }">
                {{ item['elements'] }}
              </router-link>
            </template>
        </td>
        <td>
            {{ item['weaponRefine'] }}
        </td>
        <td>
            {{ item['bannerBg'] }}
        </td>
        <td>
            {{ item['rarity'] }}
        </td>
        <td>
            {{ item['buff'] }}
        </td>
        <td>
            {{ item['artifact'] }}
        </td>
          <td>
            <router-link
              :to="{name: 'CharacterShow', params: { id: item['@id'] }}">
              <span
                class="fa fa-search"
                aria-hidden="true"></span>
              <span class="sr-only">Show</span>
            </router-link>
          </td>
          <td>
            <router-link :to="{name: 'CharacterUpdate', params: { id: item['@id'] }}">
              <span
                class="fa fa-pencil"
                aria-hidden="true"></span>
              <span class="sr-only">Edit</span>
            </router-link>
          </td>
        </tr>
      </tbody>
    </table>

    <nav aria-label="Page navigation" v-if="view">
      <router-link
        :to="view['hydra:first'] ? view['hydra:first'] : 'CharacterContactList'"
        :class="{ disabled: !view['hydra:previous'] }"
        class="btn btn-primary">
        <span aria-hidden="true">&lArr;</span> First
      </router-link>
      &nbsp;
      <router-link
        :to="!view['hydra:previous'] || view['hydra:previous'] === view['hydra:first'] ? 'CharacterList' : view['hydra:previous']"
        :class="{ disabled: !view['hydra:previous'] }"
        class="btn btn-primary">
        <span aria-hidden="true">&larr;</span> Previous
      </router-link>

      <router-link
        :to="view['hydra:next'] ? view['hydra:next'] : '#'"
        :class="{ disabled: !view['hydra:next'] }"
        class="btn btn-primary">
        Next <span aria-hidden="true">&rarr;</span>
      </router-link>

      <router-link
        :to="view['hydra:last'] ? view['hydra:last'] : '#'"
        :class="{ disabled: !view['hydra:next'] }"
        class="btn btn-primary">
        Last <span aria-hidden="true">&rArr;</span>
      </router-link>
    </nav>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';

export default {
  computed: {
      ...mapFields('character/del', {
          deletedItem: 'deleted',
      }),
      ...mapFields('character/list', {
          error: 'error',
          items: 'items',
          isLoading: 'isLoading',
          view: 'view',
      }),
  },

  mounted() {
    this.getPage();
  },

  methods: {
    ...mapActions({
      getPage: 'character/list/default',
    }),
  },
};
</script>
