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
                <a class="navbar-brand" style="margin-right: 0.1rem !important" href="#">
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
                    style="
                      padding-top: 13%;
                      padding-left: 0px;
                      font-size: 1.3rem;
                    "
                  >{{ item["name"] }}</a>
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
                  >Info</a>
                </li>
                <li class="nav-item">
                  <a
                    v-if="!info"
                    style="color: white"
                    class="nav-link active active-show"
                    v-on:click="showInfo"
                    aria-current="page"
                  >Info</a>
                </li>
                <li class="nav-item">
                  <a
                    v-if="team"
                    :style="{ color: getElementColor(item['element']['name']) }"
                    class="nav-link active active-show"
                    v-on:click="showTeam"
                    aria-current="page"
                  >Team</a>
                </li>
                <li class="nav-item">
                  <a
                    v-if="!team"
                    style="color: white;"
                    class="nav-link active active-show"
                    v-on:click="showTeam"
                    aria-current="page"
                  >Team</a>
                </li>
                <li class="nav-item">
                  <a
                    v-if="buffs"
                    :style="{ color: getElementColor(item['element']['name']) }"
                    class="nav-link active active-show"
                    v-on:click="showBuffs"
                    aria-current="page"
                  >Buffs</a>
                </li>
                <li class="nav-item">
                  <a
                    v-if="!buffs"
                    style="color: white;"
                    class="nav-link active active-show"
                    v-on:click="showBuffs"
                    aria-current="page"
                  >Buffs</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <img id="banner" :src="require('@/assets/img/fullBanners/' + item['name'] + '.jpg')" />
          <img
            class="character-icon-show nopadding"
            :src="require('@/assets/img/pPicture/' + item['name'] + '.jpg')"
            v-bind:style="{
              border: getElementBorderColor(item['element']['name']),
            }"
          />
        </div>
        <div class="row"></div>

        <div v-if="info" class="row info-section nopadding">
          <div class="col-lg-4 col-sm-12">
            <div class="row character-info-rows">
              <h4 class="title-show">Talents</h4>
              <hr />

              <div class="col-4 nopadding">
                <img class="talents-show" v-bind:src="item['AAimg']" />
                <br />10
              </div>
              <div class="col-4 nopadding">
                <img class="talents-show" v-bind:src="item['talentEimg']" />
                <br />10
              </div>
              <div class="col-4 nopadding">
                <img class="talents-show" v-bind:src="item['talentQimg']" />
                <br />10
              </div>
            </div>
            <div class="row justify-content-center character-info-rows" v-if="item.artifact[1]">
              <h4 class="title-show">Artifacts</h4>
              <hr />

              <div class="col-6 nopadding">
                <img
                  class="artifacts-character-show"
                  :src="
                    require('@/assets/img/artifacts/' +
                      item.artifact[0] +
                      '.png')
                  "
                />
              </div>
              <div class="col-6 nopadding">
                <img
                  class="artifacts-character-show"
                  :src="
                    require('@/assets/img/artifacts/' +
                      item.artifact[1] +
                      '.png')
                  "
                />
              </div>
            </div>
            <div class="row character-info-rows" v-if="!item.artifact[1]">
              <div class="col-12 nopadding">
                <img
                  class="artifacts-character-show"
                  :src="
                    require('@/assets/img/artifacts/' +
                      item.artifact[0] +
                      '.png')
                  "
                />
              </div>
            </div>
            <div class="row character-info-rows">
              <h4 class="title-show">Player Info</h4>
              <hr />
              <div class="col-12 text-center">
                <ul>
                  <li>
                    <div
                      class="mb-2"
                      style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
                    >
                      <span style=" background-color:#1f1f1f; padding: 0 10px;">Name</span>
                    </div>
                    <div :style="{ color: getElementColor(item['element']['name']) }">ArchoNix</div>
                  </li>

                  <li>
                    <div
                      class="mb-2"
                      style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
                    >
                      <span style=" background-color:#1f1f1f; padding: 0 10px;">Ar</span>
                    </div>
                    <div :style="{ color: getElementColor(item['element']['name']) }">57</div>
                  </li>

                  <li>
                    <div
                      class="mb-2"
                      style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
                    >
                      <span style=" background-color:#1f1f1f; padding: 0 10px;">Abyss Clear</span>
                    </div>
                    <div :style="{ color: getElementColor(item['element']['name']) }">12</div>
                  </li>

                  <li>
                    <div
                      class="mb-2"
                      style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
                    >
                      <span style=" background-color:#1f1f1f; padding: 0 10px;">Main Character</span>
                    </div>
                    <div :style="{ color: getElementColor(item['element']['name']) }">Eula</div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-8 col-sm-12 nopadding">
            <div class="row character-info-rows align-start" style="margin: 1.5% 6% 0% 6%!important;">
              <!-- stats -->
              <h4 class="title-show">Stats</h4>

              <hr />
              <div style="text-align:start">
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
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="fas"
                      data-icon="dice-d20"
                      class="svg-inline--fa fa-dice-d20 fa-w-15"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 480 512"
                    >
                      <path
                        fill="currentColor"
                        d="M106.75 215.06L1.2 370.95c-3.08 5 .1 11.5 5.93 12.14l208.26 22.07-108.64-190.1zM7.41 315.43L82.7 193.08 6.06 147.1c-2.67-1.6-6.06.32-6.06 3.43v162.81c0 4.03 5.29 5.53 7.41 2.09zM18.25 423.6l194.4 87.66c5.3 2.45 11.35-1.43 11.35-7.26v-65.67l-203.55-22.3c-4.45-.5-6.23 5.59-2.2 7.57zm81.22-257.78L179.4 22.88c4.34-7.06-3.59-15.25-10.78-11.14L17.81 110.35c-2.47 1.62-2.39 5.26.13 6.78l81.53 48.69zM240 176h109.21L253.63 7.62C250.5 2.54 245.25 0 240 0s-10.5 2.54-13.63 7.62L130.79 176H240zm233.94-28.9l-76.64 45.99 75.29 122.35c2.11 3.44 7.41 1.94 7.41-2.1V150.53c0-3.11-3.39-5.03-6.06-3.43zm-93.41 18.72l81.53-48.7c2.53-1.52 2.6-5.16.13-6.78l-150.81-98.6c-7.19-4.11-15.12 4.08-10.78 11.14l79.93 142.94zm79.02 250.21L256 438.32v65.67c0 5.84 6.05 9.71 11.35 7.26l194.4-87.66c4.03-1.97 2.25-8.06-2.2-7.56zm-86.3-200.97l-108.63 190.1 208.26-22.07c5.83-.65 9.01-7.14 5.93-12.14L373.25 215.06zM240 208H139.57L240 383.75 340.43 208H240z"
                      />
                    </svg>
                    <span>Crit DMG</span>
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
                  </div>
                </div>
              </div>
            </div>
            <div class="row character-info-rows align-start" style="margin: 3% 6% 0% 6% !important;">
              <h4 class="title-show">Video</h4>
              <hr />
              <iframe width="420" height="315" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
            </div>
          </div>
        </div>
        <!-- team -->
        <div v-if="team" class="row info-section nopadding">
          <div class="col-md-4 col-sm-12 nopadding">
             <div class="row character-info-rows" style="margin: 6% 6% 0% 6%;">
              <h4 class="title-show">Select Character</h4>
              <hr />
            </div>
          </div>
          
          <div class="col-md-8 col-sm-12 ">
           <div class="row character-info-rows align-start" style="margin-right:3% ;">
              <!-- stats -->
              <h4 class="title-show">Stats</h4>

              <hr />
              <div style="text-align:start">
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
                  </div>
                  <div class="col-lg-5 col-sm-12 m-2">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="fas"
                      data-icon="dice-d20"
                      class="svg-inline--fa fa-dice-d20 fa-w-15"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 480 512"
                    >
                      <path
                        fill="currentColor"
                        d="M106.75 215.06L1.2 370.95c-3.08 5 .1 11.5 5.93 12.14l208.26 22.07-108.64-190.1zM7.41 315.43L82.7 193.08 6.06 147.1c-2.67-1.6-6.06.32-6.06 3.43v162.81c0 4.03 5.29 5.53 7.41 2.09zM18.25 423.6l194.4 87.66c5.3 2.45 11.35-1.43 11.35-7.26v-65.67l-203.55-22.3c-4.45-.5-6.23 5.59-2.2 7.57zm81.22-257.78L179.4 22.88c4.34-7.06-3.59-15.25-10.78-11.14L17.81 110.35c-2.47 1.62-2.39 5.26.13 6.78l81.53 48.69zM240 176h109.21L253.63 7.62C250.5 2.54 245.25 0 240 0s-10.5 2.54-13.63 7.62L130.79 176H240zm233.94-28.9l-76.64 45.99 75.29 122.35c2.11 3.44 7.41 1.94 7.41-2.1V150.53c0-3.11-3.39-5.03-6.06-3.43zm-93.41 18.72l81.53-48.7c2.53-1.52 2.6-5.16.13-6.78l-150.81-98.6c-7.19-4.11-15.12 4.08-10.78 11.14l79.93 142.94zm79.02 250.21L256 438.32v65.67c0 5.84 6.05 9.71 11.35 7.26l194.4-87.66c4.03-1.97 2.25-8.06-2.2-7.56zm-86.3-200.97l-108.63 190.1 208.26-22.07c5.83-.65 9.01-7.14 5.93-12.14L373.25 215.06zM240 208H139.57L240 383.75 340.43 208H240z"
                      />
                    </svg>
                    <span>Crit DMG</span>
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
                  </div>
                </div>
              </div>
           </div>
            <div class="row character-info-rows">
              <h4 class="title-show">Talents</h4>
              <hr />

              <div class="col-4 nopadding">
                <img class="talents-show" v-bind:src="item['AAimg']" />
                <br />10
              </div>
              <div class="col-4 nopadding">
                <img class="talents-show" v-bind:src="item['talentEimg']" />
                <br />10
              </div>
              <div class="col-4 nopadding">
                <img class="talents-show" v-bind:src="item['talentQimg']" />
                <br />10
              </div>
            </div>
            <div class="row justify-content-center character-info-rows" v-if="item.artifact[1]">
              <h4 class="title-show">Artifacts</h4>
              <hr />

              <div class="col-6 nopadding">
                <img
                  class="artifacts-character-show"
                  :src="
                    require('@/assets/img/artifacts/' +
                      item.artifact[0] +
                      '.png')
                  "
                />
              </div>
              <div class="col-6 nopadding">
                <img
                  class="artifacts-character-show"
                  :src="
                    require('@/assets/img/artifacts/' +
                      item.artifact[1] +
                      '.png')
                  "
                />
              </div>
            </div>
            <div class="row character-info-rows" v-if="!item.artifact[1]">
              <div class="col-12 nopadding">
                <img
                  class="artifacts-character-show"
                  :src="
                    require('@/assets/img/artifacts/' +
                      item.artifact[0] +
                      '.png')
                  "
                />
              </div>
            </div>
            </div>
        </div>
        <!-- buffs -->
        <div v-if="buffs" class="row info-section nopadding"></div>
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
      buffs: false
    }
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
    }
  },
};
</script>
<style>
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
  color: white;
  cursor: pointer;
}
.active-show:hover {
  color: white;
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
  height: 145px;
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
/* .character-banner-show {
  width: 100%;
  height: 432px;
  background-size: cover;
  background-position: 10%;
  background-position-y: 0%;
}
.character-banner-icon-show {
  position: absolute;
  width: 130px;
  height: 130px;
  z-index: 1;
  border-radius: 50%;
  background-size: cover;
  left: 50%;
  transform: translate(-50%, -60%) scale(1.05);
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
}
.character-element-icon-show {
  width: 43px;
  background-color: #19232f;
  z-index: 1;
  position: absolute;
  left: 50%;
  bottom: 50%;
  transform: translate(-160%, 10%);
  border-radius: 50%;
  box-shadow: 0 4px 8px 0 rgb(255 255 255 / 20%),
    0 6px 20px 0 rgb(255 255 255 / 19%);
} */
</style>