<template>
  <div v-if="item">
    <div class="header-bg-show"></div>
    <div class="header-inv-row"></div>
    <div class="row">
      <div class="col-lg-2 col-md-1"></div>
      <div class="col-lg-8 col-md-10 col-sm-12 show-container">
        <div class="row nopadding">
          <div class="navbar navbar-expand-lg" id="CharcterShowHeader">
            <div class="container">
              <ul class="nav">
                <a
                  class="navbar-brand"
                  style="margin-right: 0.1rem !important"
                  href="#"
                >
                  <img
                    class="element-show-character"
                    :src="item['element']['img']"
                    :style="{
                      border: getElementBorderColor(item['element']['img']),
                    }"
                  />
                </a>
                <li class="nav-item">
                  <a
                    class="nav-link active active-show"
                    href="#"
                    :style="{ color: getElementColor(item['element']['name']) }"
                    style="
                      padding-top: 13%;
                      padding-left: 0px;
                      font-size: 1.3rem;
                    "
                    >{{ filterName(item["name"]) }}</a
                  >
                </li>
              </ul>
              <ul class="nav ms-auto mr-5">
                <li class="nav-item">
                  <a
                    v-if="info"
                    :style="{ color: getElementColor(item['element']['name']) }"
                    class="nav-link active active-show"
                    v-on:click="showInfo"
                    aria-current="page"
                    >Info</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    v-if="!info"
                    style="color: white"
                    class="nav-link active active-show"
                    v-on:click="showInfo"
                    aria-current="page"
                    >Info</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    v-if="team"
                    :style="{ color: getElementColor(item['element']['name']) }"
                    class="nav-link active active-show"
                    v-on:click="showTeam"
                    aria-current="page"
                    >Team</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    v-if="!team"
                    style="color: white"
                    class="nav-link active active-show"
                    v-on:click="showTeam"
                    aria-current="page"
                    >Team</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    v-if="buffs"
                    :style="{ color: getElementColor(item['element']['name']) }"
                    class="nav-link active active-show"
                    v-on:click="showBuffs"
                    aria-current="page"
                    >Buffs</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    v-if="!buffs"
                    style="color: white"
                    class="nav-link active active-show"
                    v-on:click="showBuffs"
                    aria-current="page"
                    >Buffs</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- banner and pp -->
        <div class="row">
          <img
            id="banner"
            :src="require('@/assets/img/fullBanners/' + item['name'] + '.jpg')"
          />

          <div class="card highest-damage-card">
            <div v-if="item.highestDmg" class="card-header">
              {{ addcommas(item.highestDmg) }} DMG
            </div>
            <div v-if="!item.highestDmg" class="card-header">Coming Soon</div>
          </div>
          <img
            class="character-icon-show nopadding"
            :src="require('@/assets/img/pPicture/' + item['name'] + '.jpg')"
            v-bind:style="{
              border: getElementBorderColor(item['element']['name']),
            }"
          />
        </div>
        <div class="row"></div>
        <div v-if="!item.active" class="row info-section nopadding">
          <h5 class="mt-4">
            There is no top damage for
            <span
              class="fw-bold"
              :style="{
                color: getElementColor(item['element']['name']),
              }"
              >{{ filterName(item["name"]) }}</span
            >. If you have high dmg with
            <span
              class="fw-bold"
              :style="{
                color: getElementColor(item['element']['name']),
              }"
              >{{ filterName(item["name"]) }}</span
            >
            Please don't hesitate to share it with us.
          </h5>
        </div>
        <!-- info -->
        <div v-if="info && item.active == 1" class="row info-section nopadding">
          <div class="col-lg-4 col-sm-12">
            <div class="row character-info-rows">
              <h4 class="title-show">Player Info</h4>
              <hr />
              <div class="col-12 text-center">
                <ul>
                  <li>
                    <div
                      class="mb-2"
                      style="
                        width: 100%;
                        height: 15px;
                        border-bottom: 1px solid #565656;
                        text-align: center;
                      "
                    >
                      <span style="background-color: #1f1f1f; padding: 0 10px"
                        >Name</span
                      >
                    </div>
                    <div
                      v-if="item.playerName"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                    >
                      {{ item.playerName }}
                    </div>
                    <div
                      v-if="!item.playerName"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                    >
                      Unknown
                    </div>
                  </li>

                  <li>
                    <div
                      class="mb-2"
                      style="
                        width: 100%;
                        height: 15px;
                        border-bottom: 1px solid #565656;
                        text-align: center;
                      "
                    >
                      <span style="background-color: #1f1f1f; padding: 0 10px"
                        >Ar</span
                      >
                    </div>
                    <div
                      v-if="item.ar"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                    >
                      {{ item.ar }}
                    </div>
                    <div
                      v-if="!item.ar"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                    >
                      Unknown
                    </div>
                  </li>

                  <li>
                    <div
                      class="mb-2"
                      style="
                        width: 100%;
                        height: 15px;
                        border-bottom: 1px solid #565656;
                        text-align: center;
                      "
                    >
                      <span style="background-color: #1f1f1f; padding: 0 10px"
                        >Abyss Clear</span
                      >
                    </div>
                    <div
                      v-if="item.abyssClear"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                    >
                      {{ item.abyssClear }}
                    </div>
                    <div
                      v-if="!item.abyssClear"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                    >
                      Unknown
                    </div>
                  </li>

                  <li>
                    <div
                      class="mb-2"
                      style="
                        width: 100%;
                        height: 15px;
                        border-bottom: 1px solid #565656;
                        text-align: center;
                      "
                    >
                      <span style="background-color: #1f1f1f; padding: 0 10px"
                        >Main Character</span
                      >
                    </div>
                    <div
                      v-if="item.mainChar"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                    >
                      {{ item.mainChar }}
                    </div>
                    <div
                      v-if="!item.mainChar"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                    >
                      Unknown
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row character-info-rows">
              <h4 class="title-show">Talents</h4>
              <hr />

              <div
                class="col-4 nopadding"
                :style="{ color: getElementColor(item['element']['name']) }"
              >
                <img class="talents-show" v-bind:src="item['AAimg']" />
                <br />{{ item["talentAA"] }}
              </div>
              <div
                class="col-4 nopadding"
                :style="{ color: getElementColor(item['element']['name']) }"
              >
                <img class="talents-show" v-bind:src="item['talentEimg']" />
                <br />{{ item["talentE"] }}
              </div>
              <div
                class="col-4 nopadding"
                :style="{ color: getElementColor(item['element']['name']) }"
              >
                <img class="talents-show" v-bind:src="item['talentQimg']" />
                <br />{{ item["talentQ"] }}
              </div>
            </div>

            <div
              class="row justify-content-center character-info-rows"
              v-if="item.artifact[1]"
            >
              <h4 class="title-show">Artifacts</h4>
              <hr />
              <div class="col-6 artifact-card nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item.artifact[0]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item.artifact[0].img"
                  />
                  <br />
                  {{ item.artifact[0].name }}
                </router-link>
              </div>

              <div class="col-6 artifact-card nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item.artifact[1]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item.artifact[1].img"
                  />
                  <br />
                  {{ item.artifact[1].name }}
                </router-link>
              </div>
            </div>
            <div class="row character-info-rows" v-if="!item.artifact[1]">
              <h4 class="title-show">Artifacts</h4>
              <hr />
              <router-link
                id="ArtifactRouter"
                :to="{
                  name: 'ArtifactShow',
                  params: { id: item.artifact[0]['@id'] },
                }"
              >
                <div class="col-12 artifact-card nopadding">
                  <img
                    class="artifacts-character-show"
                    :src="item.artifact[0].img"
                  />
                  <br />
                  {{ item.artifact[0].name }}
                </div>
              </router-link>
            </div>
            <div class="row justify-content-center character-info-rows">
              <h4 class="title-show">Weapon</h4>
              <hr />

              <div class="col-6 nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'WeaponShow',
                    params: { id: item['weapon']['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['weapon']['img']"
                  />
                  <br />
                  {{ item["weapon"]["name"] }}
                </router-link>
              </div>
            </div>
          </div>

          <div class="col-lg-8 col-sm-12 nopadding">
            <div
              class="row character-info-rows align-start"
              style="margin: 1.5% 6% 0% 6% !important"
            >
              <!-- stats -->
              <h4 class="title-show">Stats</h4>

              <hr />
              <div style="text-align: start">
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="hp_primary"
                      class="svg-inline--fa fa-hp_primary fa-w-13"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 11.104 14"
                    >
                      <path
                        fill="currentColor"
                        d="M2.052,7.654A.978.978,0,0,1,2.5,7.083c1.511-.85,3.586,2.117,6.544.548C10.971,13.714.151,13.878,2.052,7.654ZM5.552,14C2.177,14-1.2,11.579.416,6.74A18.543,18.543,0,0,1,5.121.213.748.748,0,0,1,5.552,0a.751.751,0,0,1,.431.212A18.543,18.543,0,0,1,10.688,6.74C12.3,11.579,8.927,14,5.552,14Zm.22-12.19a.639.639,0,0,0-.22-.075h0a.649.649,0,0,0-.221.075c-1.71,1.324-4.08,5.282-3.941,7.4a4.019,4.019,0,0,0,4.162,3.543h0A4.019,4.019,0,0,0,9.714,9.215C9.853,7.092,7.483,3.134,5.772,1.81Z"
                      />
                    </svg>
                    <span>Hp</span>
                    <span
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                      style="float: right"
                      >{{ item.hp }}</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="Atk"
                      class="svg-inline--fa fa-Atk fa-w-17"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.977"
                    >
                      <path
                        fill="currentColor"
                        d="M7.78,1.621,9.423,3.264l1.928-1.927L11.326.219A.228.228,0,0,1,11.554,0h2.2a.228.228,0,0,1,.228.228c-.121,2.661.556,2.457-1.337,2.4L10.712,4.553,12.356,6.2a.228.228,0,0,1,0,.322c-1.167,1.208-.775.907-1.892-.106L3.313,13.564A.457.457,0,0,1,3,13.7a21.32,21.32,0,0,1-2.954.239,21.172,21.172,0,0,1,.238-2.954.451.451,0,0,1,.134-.318L7.564,3.513l-.838-.838a.229.229,0,0,1,0-.323l.732-.731A.228.228,0,0,1,7.78,1.621Z"
                      />
                    </svg>
                    <span>Atk</span>
                    <span
                      style="float: right"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                      >{{ item.atk }}</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="Def"
                      class="svg-inline--fa fa-Def fa-w-15"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 12.883 14"
                    >
                      <path
                        fill="currentColor"
                        d="M12.883.726a.291.291,0,0,0-.175-.268C12.3.286,10.944,0,6.442,0S.584.286.176.458A.291.291,0,0,0,0,.727v7.44a.868.868,0,0,0,.125.453c1.579,2.6,5.347,4.855,6.161,5.339a.292.292,0,0,0,.3,0c.789-.482,4.559-2.688,6.168-5.335a.868.868,0,0,0,.127-.455ZM6.441,11.968C6.5,11.981,2.882,9.951,1.617,7.6V1.565s0-.452,4.824-.452Z"
                      />
                    </svg>
                    <span>Def</span>
                    <span
                      style="float: right"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                      >{{ item.def }}</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="ele_mas"
                      class="svg-inline--fa fa-ele_mas fa-w-18"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.113"
                    >
                      <path
                        fill="currentColor"
                        d="M8.076,7.71l-.017-.049A4.335,4.335,0,0,0,7.3,6.353a4.431,4.431,0,0,0-.325-.346A2.113,2.113,0,1,0,7,1.781a2.144,2.144,0,0,0-1.838,3.18,4.374,4.374,0,0,0-1.2-.168,4.42,4.42,0,0,0-.755.066l-.038.007C1.836-.682,10.7-2.114,10.962,3.9A3.985,3.985,0,0,1,8.076,7.71Zm3.662-2.137a3.949,3.949,0,0,0-.626-.235,4.473,4.473,0,0,1-1.105,1.7h.031A2.113,2.113,0,1,1,7.925,9.151,4.09,4.09,0,0,0,7.9,8.706,3.968,3.968,0,0,0,6.037,5.775l-.19-.11A3.963,3.963,0,1,0,6.492,12.2c.082-.068.16-.14.236-.214L6.7,11.949a4.367,4.367,0,0,1-.891-1.765A2.112,2.112,0,1,1,4.926,7.27q.1.051.189.111a2.111,2.111,0,0,1,.942,1.49,2.159,2.159,0,0,1,.018.28,3.963,3.963,0,1,0,5.663-3.578Z"
                      />
                    </svg>
                    <span>Elemental Mastery</span>
                    <span
                      style="float: right"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                      >{{ item.em }}</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="CritRate"
                      class="svg-inline--fa fa-CritRate fa-w-16"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 14"
                    >
                      <path
                        fill="currentColor"
                        d="M0,14,3.5,6.236,1.973,1.464,7.255,3.5,14,0,10.5,7.255l1.527,4.772L7.255,10.5,0,14"
                      />
                    </svg>
                    <span>Crit Rate</span>
                    <span
                      style="float: right"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                      >{{ item.cr }}%</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="CritDMG"
                      class="svg-inline--fa fa-CritDMG fa-w-16"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 14"
                    >
                      <g class="fa-group">
                        <path
                          class="fa-secondary"
                          fill="currentColor"
                          d="M 7.0449219 0.18945312 C 5.818965 0.18945312 4.6894337 0.5018163 3.71875 1.046875 L 7.3320312 2.4394531 L 10.167969 0.96679688 C 9.2331569 0.47117828 8.1707623 0.18945312 7.0449219 0.18945312 z M 1.5019531 3.0742188 C 0.74552119 4.1742335 0.30859375 5.5104369 0.30859375 6.9472656 C 0.30859375 7.872232 0.49756027 8.7546827 0.83789062 9.5585938 L 2.4394531 6.0039062 L 1.5019531 3.0742188 z M 13.132812 4.0722656 L 11.560547 7.3320312 L 12.636719 10.693359 C 13.358287 9.620801 13.779297 8.3313984 13.779297 6.9472656 C 13.779297 5.9218433 13.546433 4.9465735 13.132812 4.0722656 z M 7.3320312 11.560547 L 4.2226562 13.060547 C 5.0819109 13.459787 6.0386367 13.683594 7.0449219 13.683594 C 8.3730449 13.683594 9.6123694 13.294296 10.658203 12.625 L 7.3320312 11.560547 z "
                        ></path>
                        <path
                          class="fa-primary"
                          fill="currentColor"
                          d="m0 14 3.5-7.764-1.527-4.772L7.255 3.5 14 0l-3.5 7.255 1.527 4.772L7.255 10.5 0 14"
                        ></path>
                      </g>
                    </svg>
                    <span>Crit DMG</span>
                    <span
                      style="float: right"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                      >{{ item.cd }}%</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="EnergyRecharge_primary"
                      class="svg-inline--fa fa-EnergyRecharge_primary fa-w-17"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.282"
                    >
                      <path
                        fill="currentColor"
                        d="M14,6.641A6.642,6.642,0,0,1,.928,8.3h0L0,8.737.961,4.8l.012.012L2.392,6.3l1.37,1.433-1.23.143A4.981,4.981,0,1,0,7.359,1.66V0A6.641,6.641,0,0,1,14,6.641Z"
                      />
                    </svg>
                    <span>Energie Recharge</span>
                    <span
                      style="float: right"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                      >{{ item.er }}%</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <img
                      class="element-stats"
                      :src="item['element']['img']"
                      :style="{
                        border: getElementBorderColor(item['element']['img']),
                      }"
                    />
                    <span>Elemental DMG</span>
                    <span
                      style="float: right"
                      :style="{
                        color: getElementColor(item['element']['name']),
                      }"
                      >{{ item.ed }}%</span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div
              class="row character-info-rows align-start"
              style="margin: 3% 6% 0% 6% !important"
            >
              <h4 class="title-show">
                Constellation
                <span
                  :style="{ color: getElementColor(item['element']['name']) }"
                  >{{ item.cons }}</span
                >
              </h4>
              <span
                v-if="item.rarity == 5"
                :style="{ color: getElementColor(item['element']['name']) }"
                >* Constellations dont effect Damage</span
              >
            </div>
            <div
              class="row character-info-rows align-start"
              style="margin: 3% 6% 0% 6% !important"
            >
              <h4 class="title-show">Video</h4>
              <hr />
              <iframe
                width="420"
                height="315"
                src="https://www.youtube.com/embed/tgbNymZ7vqY"
              ></iframe>
            </div>
          </div>
        </div>
        <!-- team -->
        <div v-if="team" class="row info-section nopadding">
          <div class="col-md-4 col-sm-12 nopadding">
            <div class="row character-info-rows" style="margin: 6% 6% 0% 6%">
              <h4 class="title-show">Select Character</h4>
              <hr />
              <div v-on:click="showChar1">
                <img
                  v-if="!character1"
                  class="select-character"
                  :src="
                    require('@/assets/img/pPicture/' +
                      item['team'][0]['name'] +
                      '.jpg')
                  "
                  v-bind:style="{
                    border: getElementBorderColor(
                      item['team'][0]['element']['name']
                    ),
                  }"
                />
                <div
                  id="SelectedChar1"
                  v-if="character1"
                  class="image-circle"
                  v-bind:style="{
                    borderTop: getElementBorderColor(
                      item['team'][0]['element']['name']
                    ),
                    borderRight: getElementBorderColor(
                      item['team'][0]['element']['name']
                    ),
                  }"
                >
                  <img
                    class="select-character-active"
                    :src="
                      require('@/assets/img/pPicture/' +
                        item['team'][0]['name'] +
                        '.jpg')
                    "
                    v-bind:style="{
                      border: getElementBorderColor(
                        item['team'][0]['element']['name']
                      ),
                    }"
                  />
                </div>
                <p>{{ filterName(item["team"][0]["name"]) }}</p>
              </div>
              <div v-on:click="showChar2">
                <img
                  v-if="!character2"
                  class="select-character"
                  :src="
                    require('@/assets/img/pPicture/' +
                      item['team'][1]['name'] +
                      '.jpg')
                  "
                  v-bind:style="{
                    border: getElementBorderColor(
                      item['team'][1]['element']['name']
                    ),
                  }"
                />
                <div
                  id="SelectedChar2"
                  v-if="character2"
                  class="image-circle"
                  v-bind:style="{
                    borderTop: getElementBorderColor(
                      item['team'][1]['element']['name']
                    ),
                    borderRight: getElementBorderColor(
                      item['team'][1]['element']['name']
                    ),
                  }"
                >
                  <img
                    class="select-character-active"
                    :src="
                      require('@/assets/img/pPicture/' +
                        item['team'][1]['name'] +
                        '.jpg')
                    "
                    v-bind:style="{
                      border: getElementBorderColor(
                        item['team'][1]['element']['name']
                      ),
                    }"
                  />
                </div>
                <p>{{ filterName(item["team"][1]["name"]) }}</p>
              </div>
              <div v-on:click="showChar3">
                <img
                  v-if="!character3"
                  class="select-character"
                  :src="
                    require('@/assets/img/pPicture/' +
                      item['team'][2]['name'] +
                      '.jpg')
                  "
                  v-bind:style="{
                    border: getElementBorderColor(
                      item['team'][2]['element']['name']
                    ),
                  }"
                />
                <div
                  id="SelectedChar3"
                  v-if="character3"
                  class="image-circle"
                  v-bind:style="{
                    borderTop: getElementBorderColor(
                      item['team'][2]['element']['name']
                    ),
                    borderRight: getElementBorderColor(
                      item['team'][2]['element']['name']
                    ),
                  }"
                >
                  <img
                    class="select-character-active"
                    :src="
                      require('@/assets/img/pPicture/' +
                        item['team'][2]['name'] +
                        '.jpg')
                    "
                    v-bind:style="{
                      border: getElementBorderColor(
                        item['team'][2]['element']['name']
                      ),
                    }"
                  />
                </div>
                <p>{{ filterName(item["team"][2]["name"]) }}</p>
              </div>
            </div>

            <div
              class="row character-info-rows align-start"
              style="margin: 3% 6% 0% 6% !important"
            >
              <h4 class="title-show" style="word-wrap: break-word">
                Constellation
              </h4>
              <hr />
              <div v-if="character1">
                <h4
                  :style="{
                    color: getElementColor(
                      item['team']['0']['element']['name']
                    ),
                  }"
                >
                  C{{ item["team"]["0"].cons }}
                </h4>
                <span
                  v-if="item['team']['0']['rarity'] == 5"
                  :style="{
                    color: getElementColor(
                      item['team']['0']['element']['name']
                    ),
                  }"
                  >* Constellations dont effect Damage</span
                >
              </div>
              <div v-if="character2">
                <h4
                  :style="{
                    color: getElementColor(
                      item['team']['1']['element']['name']
                    ),
                  }"
                >
                  C{{ item["team"]["1"].cons }}
                </h4>
                <span
                  v-if="item['team']['1']['rarity'] == 5"
                  :style="{
                    color: getElementColor(
                      item['team']['1']['element']['name']
                    ),
                  }"
                  >* Constellations dont effect Damage</span
                >
              </div>
              <div v-if="character3">
                <h4
                  :style="{
                    color: getElementColor(
                      item['team']['2']['element']['name']
                    ),
                  }"
                >
                  C{{ item["team"]["2"].cons }}
                </h4>
                <span
                  v-if="item['team']['2']['rarity'] == 5"
                  :style="{
                    color: getElementColor(
                      item['team']['2']['element']['name']
                    ),
                  }"
                  >* Constellations dont effect Damage</span
                >
              </div>
            </div>
            <div
              class="row character-info-rows align-start"
              style="margin: 3% 6% 0% 6% !important"
            >
              <h4 class="title-show" style="word-wrap: break-word">Weapon</h4>
              <hr />
              <div v-if="character1">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'WeaponShow',
                    params: { id: item['team']['0'].weapon['@id'] },
                  }"
                >
                  <img
                    v-if="character1"
                    class="artifacts-character-show"
                    :src="item['team']['0']['weapon']['img']"
                  />
                  <br />
                  {{ item["team"]["0"]["weapon"]["name"] }}
                </router-link>
              </div>
              <div v-if="character2">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'WeaponShow',
                    params: { id: item['team']['1'].weapon['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['1']['weapon']['img']"
                  />
                  <br />
                  {{ item["team"]["1"]["weapon"]["name"] }}
                </router-link>
              </div>
              <div v-if="character3">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'WeaponShow',
                    params: { id: item['team']['2'].weapon['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['2']['weapon']['img']"
                  />
                  <br />
                  {{ item["team"]["2"]["weapon"]["name"] }}
                </router-link>
              </div>
            </div>
          </div>

          <div class="col-md-8 col-sm-12">
            <div
              v-if="character1"
              class="row character-info-rows align-start"
              style="margin-right: 3%"
            >
              <!-- stats -->
              <h4 class="title-show">Stats</h4>

              <hr />
              <div style="text-align: start">
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="hp_primary"
                      class="svg-inline--fa fa-hp_primary fa-w-13"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 11.104 14"
                    >
                      <path
                        fill="currentColor"
                        d="M2.052,7.654A.978.978,0,0,1,2.5,7.083c1.511-.85,3.586,2.117,6.544.548C10.971,13.714.151,13.878,2.052,7.654ZM5.552,14C2.177,14-1.2,11.579.416,6.74A18.543,18.543,0,0,1,5.121.213.748.748,0,0,1,5.552,0a.751.751,0,0,1,.431.212A18.543,18.543,0,0,1,10.688,6.74C12.3,11.579,8.927,14,5.552,14Zm.22-12.19a.639.639,0,0,0-.22-.075h0a.649.649,0,0,0-.221.075c-1.71,1.324-4.08,5.282-3.941,7.4a4.019,4.019,0,0,0,4.162,3.543h0A4.019,4.019,0,0,0,9.714,9.215C9.853,7.092,7.483,3.134,5.772,1.81Z"
                      />
                    </svg>
                    <span>Hp</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][0]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][0].hp }}</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="Atk"
                      class="svg-inline--fa fa-Atk fa-w-17"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.977"
                    >
                      <path
                        fill="currentColor"
                        d="M7.78,1.621,9.423,3.264l1.928-1.927L11.326.219A.228.228,0,0,1,11.554,0h2.2a.228.228,0,0,1,.228.228c-.121,2.661.556,2.457-1.337,2.4L10.712,4.553,12.356,6.2a.228.228,0,0,1,0,.322c-1.167,1.208-.775.907-1.892-.106L3.313,13.564A.457.457,0,0,1,3,13.7a21.32,21.32,0,0,1-2.954.239,21.172,21.172,0,0,1,.238-2.954.451.451,0,0,1,.134-.318L7.564,3.513l-.838-.838a.229.229,0,0,1,0-.323l.732-.731A.228.228,0,0,1,7.78,1.621Z"
                      />
                    </svg>
                    <span>Atk</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][0]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][0].atk }}</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="Def"
                      class="svg-inline--fa fa-Def fa-w-15"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 12.883 14"
                    >
                      <path
                        fill="currentColor"
                        d="M12.883.726a.291.291,0,0,0-.175-.268C12.3.286,10.944,0,6.442,0S.584.286.176.458A.291.291,0,0,0,0,.727v7.44a.868.868,0,0,0,.125.453c1.579,2.6,5.347,4.855,6.161,5.339a.292.292,0,0,0,.3,0c.789-.482,4.559-2.688,6.168-5.335a.868.868,0,0,0,.127-.455ZM6.441,11.968C6.5,11.981,2.882,9.951,1.617,7.6V1.565s0-.452,4.824-.452Z"
                      />
                    </svg>
                    <span>Def</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][0]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][0].def }}</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="ele_mas"
                      class="svg-inline--fa fa-ele_mas fa-w-18"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.113"
                    >
                      <path
                        fill="currentColor"
                        d="M8.076,7.71l-.017-.049A4.335,4.335,0,0,0,7.3,6.353a4.431,4.431,0,0,0-.325-.346A2.113,2.113,0,1,0,7,1.781a2.144,2.144,0,0,0-1.838,3.18,4.374,4.374,0,0,0-1.2-.168,4.42,4.42,0,0,0-.755.066l-.038.007C1.836-.682,10.7-2.114,10.962,3.9A3.985,3.985,0,0,1,8.076,7.71Zm3.662-2.137a3.949,3.949,0,0,0-.626-.235,4.473,4.473,0,0,1-1.105,1.7h.031A2.113,2.113,0,1,1,7.925,9.151,4.09,4.09,0,0,0,7.9,8.706,3.968,3.968,0,0,0,6.037,5.775l-.19-.11A3.963,3.963,0,1,0,6.492,12.2c.082-.068.16-.14.236-.214L6.7,11.949a4.367,4.367,0,0,1-.891-1.765A2.112,2.112,0,1,1,4.926,7.27q.1.051.189.111a2.111,2.111,0,0,1,.942,1.49,2.159,2.159,0,0,1,.018.28,3.963,3.963,0,1,0,5.663-3.578Z"
                      />
                    </svg>
                    <span>Elemental Mastery</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][0]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][0].em }}</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="CritRate"
                      class="svg-inline--fa fa-CritRate fa-w-16"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 14"
                    >
                      <path
                        fill="currentColor"
                        d="M0,14,3.5,6.236,1.973,1.464,7.255,3.5,14,0,10.5,7.255l1.527,4.772L7.255,10.5,0,14"
                      />
                    </svg>
                    <span>Crit Rate</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][0]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][0].cr }}%</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="CritDMG"
                      class="svg-inline--fa fa-CritDMG fa-w-16"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 14"
                    >
                      <g class="fa-group">
                        <path
                          class="fa-secondary"
                          fill="currentColor"
                          d="M 7.0449219 0.18945312 C 5.818965 0.18945312 4.6894337 0.5018163 3.71875 1.046875 L 7.3320312 2.4394531 L 10.167969 0.96679688 C 9.2331569 0.47117828 8.1707623 0.18945312 7.0449219 0.18945312 z M 1.5019531 3.0742188 C 0.74552119 4.1742335 0.30859375 5.5104369 0.30859375 6.9472656 C 0.30859375 7.872232 0.49756027 8.7546827 0.83789062 9.5585938 L 2.4394531 6.0039062 L 1.5019531 3.0742188 z M 13.132812 4.0722656 L 11.560547 7.3320312 L 12.636719 10.693359 C 13.358287 9.620801 13.779297 8.3313984 13.779297 6.9472656 C 13.779297 5.9218433 13.546433 4.9465735 13.132812 4.0722656 z M 7.3320312 11.560547 L 4.2226562 13.060547 C 5.0819109 13.459787 6.0386367 13.683594 7.0449219 13.683594 C 8.3730449 13.683594 9.6123694 13.294296 10.658203 12.625 L 7.3320312 11.560547 z "
                        ></path>
                        <path
                          class="fa-primary"
                          fill="currentColor"
                          d="m0 14 3.5-7.764-1.527-4.772L7.255 3.5 14 0l-3.5 7.255 1.527 4.772L7.255 10.5 0 14"
                        ></path>
                      </g>
                    </svg>
                    <span>Crit DMG</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][0]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][0].cd }}%</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="EnergyRecharge_primary"
                      class="svg-inline--fa fa-EnergyRecharge_primary fa-w-17"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.282"
                    >
                      <path
                        fill="currentColor"
                        d="M14,6.641A6.642,6.642,0,0,1,.928,8.3h0L0,8.737.961,4.8l.012.012L2.392,6.3l1.37,1.433-1.23.143A4.981,4.981,0,1,0,7.359,1.66V0A6.641,6.641,0,0,1,14,6.641Z"
                      />
                    </svg>
                    <span>Energie Recharge</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][0]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][0].er }}%</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <img
                      class="element-stats"
                      :src="item['team'][0]['element']['img']"
                      :style="{
                        border: getElementBorderColor(item['element']['img']),
                      }"
                    />
                    <span>Elemental DMG</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][0]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][0].ed }}%</span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div
              v-if="character2"
              class="row character-info-rows align-start"
              style="margin-right: 3%"
            >
              <!-- stats -->
              <h4 class="title-show">Stats</h4>

              <hr />
              <div style="text-align: start">
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="hp_primary"
                      class="svg-inline--fa fa-hp_primary fa-w-13"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 11.104 14"
                    >
                      <path
                        fill="currentColor"
                        d="M2.052,7.654A.978.978,0,0,1,2.5,7.083c1.511-.85,3.586,2.117,6.544.548C10.971,13.714.151,13.878,2.052,7.654ZM5.552,14C2.177,14-1.2,11.579.416,6.74A18.543,18.543,0,0,1,5.121.213.748.748,0,0,1,5.552,0a.751.751,0,0,1,.431.212A18.543,18.543,0,0,1,10.688,6.74C12.3,11.579,8.927,14,5.552,14Zm.22-12.19a.639.639,0,0,0-.22-.075h0a.649.649,0,0,0-.221.075c-1.71,1.324-4.08,5.282-3.941,7.4a4.019,4.019,0,0,0,4.162,3.543h0A4.019,4.019,0,0,0,9.714,9.215C9.853,7.092,7.483,3.134,5.772,1.81Z"
                      />
                    </svg>
                    <span>Hp</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][1]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][1].hp }}</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="Atk"
                      class="svg-inline--fa fa-Atk fa-w-17"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.977"
                    >
                      <path
                        fill="currentColor"
                        d="M7.78,1.621,9.423,3.264l1.928-1.927L11.326.219A.228.228,0,0,1,11.554,0h2.2a.228.228,0,0,1,.228.228c-.121,2.661.556,2.457-1.337,2.4L10.712,4.553,12.356,6.2a.228.228,0,0,1,0,.322c-1.167,1.208-.775.907-1.892-.106L3.313,13.564A.457.457,0,0,1,3,13.7a21.32,21.32,0,0,1-2.954.239,21.172,21.172,0,0,1,.238-2.954.451.451,0,0,1,.134-.318L7.564,3.513l-.838-.838a.229.229,0,0,1,0-.323l.732-.731A.228.228,0,0,1,7.78,1.621Z"
                      />
                    </svg>
                    <span>Atk</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][1]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][1].atk }}</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="Def"
                      class="svg-inline--fa fa-Def fa-w-15"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 12.883 14"
                    >
                      <path
                        fill="currentColor"
                        d="M12.883.726a.291.291,0,0,0-.175-.268C12.3.286,10.944,0,6.442,0S.584.286.176.458A.291.291,0,0,0,0,.727v7.44a.868.868,0,0,0,.125.453c1.579,2.6,5.347,4.855,6.161,5.339a.292.292,0,0,0,.3,0c.789-.482,4.559-2.688,6.168-5.335a.868.868,0,0,0,.127-.455ZM6.441,11.968C6.5,11.981,2.882,9.951,1.617,7.6V1.565s0-.452,4.824-.452Z"
                      />
                    </svg>
                    <span>Def</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][1]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][1].def }}</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="ele_mas"
                      class="svg-inline--fa fa-ele_mas fa-w-18"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.113"
                    >
                      <path
                        fill="currentColor"
                        d="M8.076,7.71l-.017-.049A4.335,4.335,0,0,0,7.3,6.353a4.431,4.431,0,0,0-.325-.346A2.113,2.113,0,1,0,7,1.781a2.144,2.144,0,0,0-1.838,3.18,4.374,4.374,0,0,0-1.2-.168,4.42,4.42,0,0,0-.755.066l-.038.007C1.836-.682,10.7-2.114,10.962,3.9A3.985,3.985,0,0,1,8.076,7.71Zm3.662-2.137a3.949,3.949,0,0,0-.626-.235,4.473,4.473,0,0,1-1.105,1.7h.031A2.113,2.113,0,1,1,7.925,9.151,4.09,4.09,0,0,0,7.9,8.706,3.968,3.968,0,0,0,6.037,5.775l-.19-.11A3.963,3.963,0,1,0,6.492,12.2c.082-.068.16-.14.236-.214L6.7,11.949a4.367,4.367,0,0,1-.891-1.765A2.112,2.112,0,1,1,4.926,7.27q.1.051.189.111a2.111,2.111,0,0,1,.942,1.49,2.159,2.159,0,0,1,.018.28,3.963,3.963,0,1,0,5.663-3.578Z"
                      />
                    </svg>
                    <span>Elemental Mastery</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][1]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][1].em }}</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="CritRate"
                      class="svg-inline--fa fa-CritRate fa-w-16"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 14"
                    >
                      <path
                        fill="currentColor"
                        d="M0,14,3.5,6.236,1.973,1.464,7.255,3.5,14,0,10.5,7.255l1.527,4.772L7.255,10.5,0,14"
                      />
                    </svg>
                    <span>Crit Rate</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][1]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][1].cr }}%</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="CritDMG"
                      class="svg-inline--fa fa-CritDMG fa-w-16"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 14"
                    >
                      <g class="fa-group">
                        <path
                          class="fa-secondary"
                          fill="currentColor"
                          d="M 7.0449219 0.18945312 C 5.818965 0.18945312 4.6894337 0.5018163 3.71875 1.046875 L 7.3320312 2.4394531 L 10.167969 0.96679688 C 9.2331569 0.47117828 8.1707623 0.18945312 7.0449219 0.18945312 z M 1.5019531 3.0742188 C 0.74552119 4.1742335 0.30859375 5.5104369 0.30859375 6.9472656 C 0.30859375 7.872232 0.49756027 8.7546827 0.83789062 9.5585938 L 2.4394531 6.0039062 L 1.5019531 3.0742188 z M 13.132812 4.0722656 L 11.560547 7.3320312 L 12.636719 10.693359 C 13.358287 9.620801 13.779297 8.3313984 13.779297 6.9472656 C 13.779297 5.9218433 13.546433 4.9465735 13.132812 4.0722656 z M 7.3320312 11.560547 L 4.2226562 13.060547 C 5.0819109 13.459787 6.0386367 13.683594 7.0449219 13.683594 C 8.3730449 13.683594 9.6123694 13.294296 10.658203 12.625 L 7.3320312 11.560547 z "
                        ></path>
                        <path
                          class="fa-primary"
                          fill="currentColor"
                          d="m0 14 3.5-7.764-1.527-4.772L7.255 3.5 14 0l-3.5 7.255 1.527 4.772L7.255 10.5 0 14"
                        ></path>
                      </g>
                    </svg>
                    <span>Crit DMG</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][1]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][1].cd }}%</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="EnergyRecharge_primary"
                      class="svg-inline--fa fa-EnergyRecharge_primary fa-w-17"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.282"
                    >
                      <path
                        fill="currentColor"
                        d="M14,6.641A6.642,6.642,0,0,1,.928,8.3h0L0,8.737.961,4.8l.012.012L2.392,6.3l1.37,1.433-1.23.143A4.981,4.981,0,1,0,7.359,1.66V0A6.641,6.641,0,0,1,14,6.641Z"
                      />
                    </svg>
                    <span>Energie Recharge</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][1]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][1].er }}%</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <img
                      class="element-stats"
                      :src="item['team'][1]['element']['img']"
                      :style="{
                        border: getElementBorderColor(item['element']['img']),
                      }"
                    />
                    <span>Elemental DMG</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][1]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][1].ed }}%</span
                    >
                  </div>
                </div>
              </div>
            </div>

            <div
              v-if="character3"
              class="row character-info-rows align-start"
              style="margin-right: 3%"
            >
              <!-- stats -->
              <h4 class="title-show">Stats</h4>

              <hr />
              <div style="text-align: start">
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="hp_primary"
                      class="svg-inline--fa fa-hp_primary fa-w-13"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 11.104 14"
                    >
                      <path
                        fill="currentColor"
                        d="M2.052,7.654A.978.978,0,0,1,2.5,7.083c1.511-.85,3.586,2.117,6.544.548C10.971,13.714.151,13.878,2.052,7.654ZM5.552,14C2.177,14-1.2,11.579.416,6.74A18.543,18.543,0,0,1,5.121.213.748.748,0,0,1,5.552,0a.751.751,0,0,1,.431.212A18.543,18.543,0,0,1,10.688,6.74C12.3,11.579,8.927,14,5.552,14Zm.22-12.19a.639.639,0,0,0-.22-.075h0a.649.649,0,0,0-.221.075c-1.71,1.324-4.08,5.282-3.941,7.4a4.019,4.019,0,0,0,4.162,3.543h0A4.019,4.019,0,0,0,9.714,9.215C9.853,7.092,7.483,3.134,5.772,1.81Z"
                      />
                    </svg>
                    <span>Hp</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][2]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][2].hp }}</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="Atk"
                      class="svg-inline--fa fa-Atk fa-w-17"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.977"
                    >
                      <path
                        fill="currentColor"
                        d="M7.78,1.621,9.423,3.264l1.928-1.927L11.326.219A.228.228,0,0,1,11.554,0h2.2a.228.228,0,0,1,.228.228c-.121,2.661.556,2.457-1.337,2.4L10.712,4.553,12.356,6.2a.228.228,0,0,1,0,.322c-1.167,1.208-.775.907-1.892-.106L3.313,13.564A.457.457,0,0,1,3,13.7a21.32,21.32,0,0,1-2.954.239,21.172,21.172,0,0,1,.238-2.954.451.451,0,0,1,.134-.318L7.564,3.513l-.838-.838a.229.229,0,0,1,0-.323l.732-.731A.228.228,0,0,1,7.78,1.621Z"
                      />
                    </svg>
                    <span>Atk</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][2]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][2].atk }}</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="Def"
                      class="svg-inline--fa fa-Def fa-w-15"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 12.883 14"
                    >
                      <path
                        fill="currentColor"
                        d="M12.883.726a.291.291,0,0,0-.175-.268C12.3.286,10.944,0,6.442,0S.584.286.176.458A.291.291,0,0,0,0,.727v7.44a.868.868,0,0,0,.125.453c1.579,2.6,5.347,4.855,6.161,5.339a.292.292,0,0,0,.3,0c.789-.482,4.559-2.688,6.168-5.335a.868.868,0,0,0,.127-.455ZM6.441,11.968C6.5,11.981,2.882,9.951,1.617,7.6V1.565s0-.452,4.824-.452Z"
                      />
                    </svg>
                    <span>Def</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][2]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][2].def }}</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="ele_mas"
                      class="svg-inline--fa fa-ele_mas fa-w-18"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.113"
                    >
                      <path
                        fill="currentColor"
                        d="M8.076,7.71l-.017-.049A4.335,4.335,0,0,0,7.3,6.353a4.431,4.431,0,0,0-.325-.346A2.113,2.113,0,1,0,7,1.781a2.144,2.144,0,0,0-1.838,3.18,4.374,4.374,0,0,0-1.2-.168,4.42,4.42,0,0,0-.755.066l-.038.007C1.836-.682,10.7-2.114,10.962,3.9A3.985,3.985,0,0,1,8.076,7.71Zm3.662-2.137a3.949,3.949,0,0,0-.626-.235,4.473,4.473,0,0,1-1.105,1.7h.031A2.113,2.113,0,1,1,7.925,9.151,4.09,4.09,0,0,0,7.9,8.706,3.968,3.968,0,0,0,6.037,5.775l-.19-.11A3.963,3.963,0,1,0,6.492,12.2c.082-.068.16-.14.236-.214L6.7,11.949a4.367,4.367,0,0,1-.891-1.765A2.112,2.112,0,1,1,4.926,7.27q.1.051.189.111a2.111,2.111,0,0,1,.942,1.49,2.159,2.159,0,0,1,.018.28,3.963,3.963,0,1,0,5.663-3.578Z"
                      />
                    </svg>
                    <span>Elemental Mastery</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][2]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][2].em }}</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="CritRate"
                      class="svg-inline--fa fa-CritRate fa-w-16"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 14"
                    >
                      <path
                        fill="currentColor"
                        d="M0,14,3.5,6.236,1.973,1.464,7.255,3.5,14,0,10.5,7.255l1.527,4.772L7.255,10.5,0,14"
                      />
                    </svg>
                    <span>Crit Rate</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][2]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][2].cr }}%</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="CritDMG"
                      class="svg-inline--fa fa-CritDMG fa-w-16"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 14"
                    >
                      <g class="fa-group">
                        <path
                          class="fa-secondary"
                          fill="currentColor"
                          d="M 7.0449219 0.18945312 C 5.818965 0.18945312 4.6894337 0.5018163 3.71875 1.046875 L 7.3320312 2.4394531 L 10.167969 0.96679688 C 9.2331569 0.47117828 8.1707623 0.18945312 7.0449219 0.18945312 z M 1.5019531 3.0742188 C 0.74552119 4.1742335 0.30859375 5.5104369 0.30859375 6.9472656 C 0.30859375 7.872232 0.49756027 8.7546827 0.83789062 9.5585938 L 2.4394531 6.0039062 L 1.5019531 3.0742188 z M 13.132812 4.0722656 L 11.560547 7.3320312 L 12.636719 10.693359 C 13.358287 9.620801 13.779297 8.3313984 13.779297 6.9472656 C 13.779297 5.9218433 13.546433 4.9465735 13.132812 4.0722656 z M 7.3320312 11.560547 L 4.2226562 13.060547 C 5.0819109 13.459787 6.0386367 13.683594 7.0449219 13.683594 C 8.3730449 13.683594 9.6123694 13.294296 10.658203 12.625 L 7.3320312 11.560547 z "
                        ></path>
                        <path
                          class="fa-primary"
                          fill="currentColor"
                          d="m0 14 3.5-7.764-1.527-4.772L7.255 3.5 14 0l-3.5 7.255 1.527 4.772L7.255 10.5 0 14"
                        ></path>
                      </g>
                    </svg>
                    <span>Crit DMG</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][2]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][2].cd }}%</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="faga"
                      data-icon="EnergyRecharge_primary"
                      class="svg-inline--fa fa-EnergyRecharge_primary fa-w-17"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 14 13.282"
                    >
                      <path
                        fill="currentColor"
                        d="M14,6.641A6.642,6.642,0,0,1,.928,8.3h0L0,8.737.961,4.8l.012.012L2.392,6.3l1.37,1.433-1.23.143A4.981,4.981,0,1,0,7.359,1.66V0A6.641,6.641,0,0,1,14,6.641Z"
                      />
                    </svg>
                    <span>Energie Recharge</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][2]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][2].er }}%</span
                    >
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <img
                      class="element-stats"
                      :src="item['team'][2]['element']['img']"
                      :style="{
                        border: getElementBorderColor(item['element']['img']),
                      }"
                    />
                    <span>Elemental DMG</span>
                    <span
                      :style="{
                        color: getElementColor(
                          item['team'][2]['element']['name']
                        ),
                      }"
                      style="float: right"
                      >{{ item["team"][2].ed }}%</span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div v-if="character1" class="row character-info-rows">
              <h4 class="title-show">Talents</h4>
              <hr />

              <div
                class="col-4 nopadding"
                :style="{
                  color: getElementColor(item['team'][0]['element']['name']),
                }"
              >
                <img
                  class="talents-show"
                  v-bind:src="item['team']['0']['AAimg']"
                />
                <br />
                {{ item["team"]["0"]["talentAA"] }}
              </div>
              <div
                class="col-4 nopadding"
                :style="{
                  color: getElementColor(item['team'][0]['element']['name']),
                }"
              >
                <img
                  class="talents-show"
                  v-bind:src="item['team']['0']['talentEimg']"
                />
                <br />
                {{ item["team"]["0"]["talentE"] }}
              </div>
              <div
                class="col-4 nopadding"
                :style="{
                  color: getElementColor(item['team'][0]['element']['name']),
                }"
              >
                <img
                  class="talents-show"
                  v-bind:src="item['team']['0']['talentQimg']"
                />
                <br />
                {{ item["team"]["0"]["talentQ"] }}
              </div>
            </div>
            <div v-if="character2" class="row character-info-rows">
              <h4 class="title-show">Talents</h4>
              <hr />

              <div
                class="col-4 nopadding"
                :style="{
                  color: getElementColor(item['team'][1]['element']['name']),
                }"
              >
                <img
                  class="talents-show"
                  v-bind:src="item['team']['1']['AAimg']"
                />
                <br />
                {{ item["team"]["1"]["talentAA"] }}
              </div>
              <div
                class="col-4 nopadding"
                :style="{
                  color: getElementColor(item['team'][1]['element']['name']),
                }"
              >
                <img
                  class="talents-show"
                  v-bind:src="item['team']['1']['talentEimg']"
                />
                <br />
                {{ item["team"]["1"]["talentE"] }}
              </div>
              <div
                class="col-4 nopadding"
                :style="{
                  color: getElementColor(item['team'][1]['element']['name']),
                }"
              >
                <img
                  class="talents-show"
                  v-bind:src="item['team']['1']['talentQimg']"
                />
                <br />
                {{ item["team"]["1"]["talentQ"] }}
              </div>
            </div>
            <div v-if="character3" class="row character-info-rows">
              <h4 class="title-show">Talents</h4>
              <hr />

              <div
                class="col-4 nopadding"
                :style="{
                  color: getElementColor(item['team'][2]['element']['name']),
                }"
              >
                <img
                  class="talents-show"
                  v-bind:src="item['team']['2']['AAimg']"
                />
                <br />
                {{ item["team"]["2"]["talentAA"] }}
              </div>
              <div
                class="col-4 nopadding"
                :style="{
                  color: getElementColor(item['team'][2]['element']['name']),
                }"
              >
                <img
                  class="talents-show"
                  v-bind:src="item['team']['2']['talentEimg']"
                />
                <br />
                {{ item["team"]["2"]["talentE"] }}
              </div>
              <div
                class="col-4 nopadding"
                :style="{
                  color: getElementColor(item['team'][2]['element']['name']),
                }"
              >
                <img
                  class="talents-show"
                  v-bind:src="item['team']['2']['talentQimg']"
                />
                <br />
                {{ item["team"]["2"]["talentQ"] }}
              </div>
            </div>
            <div
              class="row justify-content-center character-info-rows"
              v-if="item['team']['0'].artifact[1] && character1"
            >
              <h4 class="title-show">Artifacts</h4>
              <hr />

              <div class="col-6 nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item['team']['0'].artifact[0]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['0'].artifact[0].img"
                  />
                  <br />
                  {{ item["team"]["0"].artifact[0].name }}
                </router-link>
              </div>
              <div class="col-6 nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item['team']['0'].artifact[1]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['0'].artifact[1].img"
                  />
                  <br />
                  {{ item["team"]["0"].artifact[1].name }}
                </router-link>
              </div>
            </div>
            <div
              class="row character-info-rows"
              v-if="!item['team']['0'].artifact[1] && character1"
            >
              <h4 class="title-show">Artifacts</h4>
              <hr />
              <div class="col-12 nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item['team']['0'].artifact[0]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['0'].artifact[0].img"
                  />
                  <br />
                  {{ item["team"]["0"].artifact[0].name }}
                </router-link>
              </div>
            </div>
            <div
              class="row justify-content-center character-info-rows"
              v-if="item['team']['1'].artifact[1] && character2"
            >
              <h4 class="title-show">Artifacts</h4>
              <hr />

              <div class="col-6 nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item['team']['1'].artifact[0]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['1'].artifact[0].img"
                  />
                  <br />
                  {{ item["team"]["1"].artifact[0].name }}
                </router-link>
              </div>
              <div class="col-6 nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item['team']['1'].artifact[1]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['1'].artifact[1].img"
                  />
                  <br />
                  {{ item["team"]["1"].artifact[1].name }}
                </router-link>
              </div>
            </div>
            <div
              class="row character-info-rows"
              v-if="!item['team']['1'].artifact[1] && character2"
            >
              <h4 class="title-show">Artifacts</h4>
              <hr />
              <div class="col-12 nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item['team']['1'].artifact[0]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['1'].artifact[0].img"
                  />
                  <br />
                  {{ item["team"]["1"].artifact[0].name }}
                </router-link>
              </div>
            </div>
            <div
              class="row justify-content-center character-info-rows"
              v-if="item['team']['2'].artifact[1] && character3"
            >
              <h4 class="title-show">Artifacts</h4>
              <hr />

              <div class="col-6 nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item['team']['2'].artifact[0]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['2'].artifact[0].img"
                  />
                  <br />
                  {{ item["team"]["2"].artifact[0].name }}
                </router-link>
              </div>
              <div class="col-6 nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item['team']['2'].artifact[1]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['2'].artifact[1].img"
                  />
                  <br />
                  {{ item["team"]["2"].artifact[1].name }}
                </router-link>
              </div>
            </div>
            <div
              class="row character-info-rows"
              v-if="!item['team']['2'].artifact[1] && character3"
            >
              <h4 class="title-show">Artifacts</h4>
              <hr />
              <div class="col-12 nopadding">
                <router-link
                  id="ArtifactRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: item['team']['2'].artifact[0]['@id'] },
                  }"
                >
                  <img
                    class="artifacts-character-show"
                    :src="item['team']['2'].artifact[0].img"
                  />
                  <br />
                  {{ item["team"]["2"].artifact[0].name }}
                </router-link>
              </div>
            </div>
          </div>
        </div>
        <!-- buffs -->
        <div v-if="item.allBuffs && buffs" class="row info-section nopadding">
          <div
            class="col-6 col-md-3 col-lg-2"
            v-for="buff in item.allBuffs"
            :key="buff['@id']"
          >
            <div class="buff-card" v-if="buff.character">
              <div class="card-body">
                <router-link
                  id="BuffRouter"
                  :to="{ name: 'BuffShow', params: { id: buff['@id'] } }"
                >
                  <h5 class="card-title">
                    <img
                      id="CharacterElementBuffsList"
                      v-bind:src="buff.character['element']['img']"
                      v-bind:style="{
                        border: getElementBorderColor(
                          buff.character['element']['name']
                        ),
                      }"
                    />
                    <img
                      :src="
                        require('@/assets/img/pPicture/' +
                          buff.character['name'] +
                          '.jpg')
                      "
                      style="width: 106px"
                      class="character-buff-icon"
                      v-bind:style="{
                        border: getElementBorderColor(
                          buff.character['element']['name']
                        ),
                      }"
                    />
                  </h5>
                  <h6 class="card-subtitle mt-3" style="color: whit !important">
                    {{ filterName(buff.character.name) }}
                  </h6>
                </router-link>
              </div>
            </div>

            <div class="buff-card" v-if="buff.artifact">
              <div class="card-body">
                <router-link
                  id="BuffRouter"
                  :to="{
                    name: 'ArtifactShow',
                    params: { id: buff.artifact['@id'] },
                  }"
                >
                  <h5 class="card-title">
                    <img
                      :src="buff.artifact.img"
                      style="width: 106px"
                      id="BuffImg"
                    />
                  </h5>
                  <h6 class="card-subtitle mt-3" style="color: whit !important">
                    {{ buff.artifact.name }}
                  </h6>
                </router-link>
              </div>
            </div>
            <div class="buff-card" v-if="buff.weapon">
              <div class="card-body">
                <router-link
                  id="BuffRouter"
                  :to="{
                    name: 'WeaponShow',
                    params: { id: buff.weapon['@id'] },
                  }"
                >
                  <h5 class="card-title">
                    <img
                      :src="buff.weapon.img"
                      style="width: 106px"
                      id="BuffImg"
                    />
                  </h5>
                  <h6 class="card-subtitle mt-3" style="color: whit !important">
                    {{ buff.weapon.name }}
                  </h6>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-1"></div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapFields } from "vuex-map-fields";
import { charactersMixin } from "../../mixins/charactersMixin";

export default {
  mixins: [charactersMixin],
  data() {
    return {
      info: true,
      team: false,
      buffs: false,
      character1: true,
      character2: false,
      character3: false,
    };
  },
  computed: {
    ...mapFields("character/show", {
      error: "error",
      isLoading: "isLoading",
      item: "retrieved",
    }),
  },

  beforeDestroy() {
    this.reset();
  },

  created() {
    this.retrieve(decodeURIComponent(this.$route.params.id));
  },

  methods: {
    ...mapActions({
      del: "character/del/del",
      reset: "character/show/reset",
      retrieve: "character/show/retrieve",
    }),
    filterName(name) {
      console.log(this.item)
      return name.replace("-", " ");
    
    },
    addcommas(number){
      return number.toLocaleString("en-US")
    },
    showInfo() {
      this.info = true;
      this.team = false;
      this.buffs = false;
    },
    showTeam() {
      this.info = false;
      this.team = true;
      this.buffs = false;
    },
    showBuffs() {
      this.info = false;
      this.team = false;
      this.buffs = true;
    },
    showChar1() {
      this.character1 = true;
      this.character2 = false;
      this.character3 = false;
      var el = document.getElementById("SelectedChar1");
    },
    showChar2() {
      this.character1 = false;
      this.character2 = true;
      this.character3 = false;
      var el = document.getElementById("SelectedChar2");
    },
    showChar3() {
      this.character1 = false;
      this.character2 = false;
      this.character3 = true;
      var el = document.getElementById("SelectedChar3");
    },
  },
};
</script>
<style>
@import url("https://fonts.googleapis.com/css2?family=Lobster&display=swap");
.character-icon-show {
  width: 110px;
  position: absolute;
  left: 50%;
  top: 36.5rem;
  transform: translate(-50%, -50%);
  box-shadow: 0 4px 8px 0 rgb(255 255 255 / 20%),
    0 6px 20px 0 rgb(255 255 255 / 19%);
  border-radius: 50%;
}
.active-show {
  cursor: pointer;
}
.select-character {
  width: 110px;
  height: 110px;
  border-radius: 50%;
  margin: 5% !important;
}
.select-character-active {
  width: 170px;
}

#CharcterShowHeader {
  background-color: #111111e8;
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2);
}
.title-show {
  font-size: 2rem;
  font-weight: 800;
}
.talents-show {
  width: 60px;
  margin: 2%;
}
.character-info-rows {
  background-color: #1f1f1f;
  margin: 3%;
  padding: 4%;
  border: 2px solid #ffffff50;
  border-radius: 3px;
  box-shadow: rgb(73 71 71 / 56%) -4px 0px 5px 1px;
}
.team-show-character {
  background-color: #1f1f1f;
  padding: 5%;
  border: 2px solid #ffffff50;
  border-radius: 3px;
}
.header-bg-show {
  background-image: url("../../assets/img/homePage/HomePageHeader.jpeg");
  width: 100%;
  height: 200px;
  background-size: cover;
  background-position-y: 20%;
  background-position-x: 50%;
  filter: blur(8px);
  -webkit-filter: blur(8px);
  position: absolute;
  z-index: -1;
}
.artifacts-character-show {
  width: 90px;
  height: 90px;
}
.show-container {
  margin-bottom: 100px;
}
#banner {
  height: 350px;
  object-fit: cover;
  object-position: top left;
}
.svg-inline--fa {
  width: 19px;
  height: 20px;
}
.header-inv-row {
  height: 140px;
}
.nopadding {
  padding: 0 !important;
  margin: 0 !important;
}
.info-section {
  background-color: #111111e8;
  padding: 3% !important;
  border-bottom: 2px solid #ffffff50;
}
.element-show-character {
  width: 40px;
  height: 40px;
}
.element-stats {
  width: 23px;
  height: 24px;
}
.image-circle {
  width: 132px;
  height: 132px;
  border-radius: 50%;
  margin-left: auto;

  margin-right: auto;
  border-left: 2px dashed white;
  border-bottom: 2px dashed white;
  padding: 5px;
  animation: spin 10s infinite linear;
}
.image-circle img {
  animation: spin 10s infinite reverse linear;
  width: 100%;
  border-radius: 50%;
  top: 50%;
}

@keyframes spin {
  100% {
    transform: rotate(1turn);
  }
}
.artifact-card {
  font-size: 80%;
  cursor: pointer;
}
#CharacterElementBuffsList {
  width: 30px;
  position: absolute;
  z-index: 1;
  background-color: #19232f;
  border-radius: 50%;
  box-shadow: 0 4px 8px 0 rgb(255 255 255 / 20%),
    0 6px 20px 0 rgb(255 255 255 / 19%);
}
.character-buff-icon {
  border-radius: 50%;
}
#BuffImg {
  -webkit-filter: drop-shadow(1px 1px 0 #f5f5f5d7)
    drop-shadow(-1px -1px 0 #f5f5f5d7);
  filter: drop-shadow(1px 1px 0 #f5f5f5d7) drop-shadow(-1px -1px 0 #f5f5f5d7);
}
#BuffRouter {
  color: white;
  text-decoration: none;
}
.buff-card:hover {
  transform: scale(1.05);
}
.buff-card {
  margin: 3%;
  transition: ease-out 0.3s;
}

.highest-damage-card {
  position: absolute;
  left: 68%;
  top: 27rem;
  width: 300px;
  background-color: #111111b3;
  transform: translate(-40%, -50%);
  border: 2px solid #ffffff50;
  border-radius: 3px;
  box-shadow: rgb(73 71 71 / 56%) -4px 0px 5px 1px;
}
@media (max-width: 530px) {
  .highest-damage-card {
    left: 50%;
    top: 27rem;
    transform: translate(-50%, -50%);
  }
}
</style>