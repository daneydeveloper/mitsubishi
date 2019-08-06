<link rel="stylesheet" type="text/css" href="http://cdn.marketingmidia9.com.br/css/sweetalert2.css">
<div ng-app="app">
  <aside id="form" ng-controller="Lead" class="container form_sanfona" >
   <div class="background">
      <div>
         <div class="cotacao">
            <h1 class="caps color-white text-center" ">
               <div style="color: white !important;">Solicite aqui  sua<strong>Cotação</strong></div>
            </h1>
            <form name="solicitou-cotacao">
               <div class="input">
                  <div class="col-xs-12 pad">
                     <input type="text" ng-model="dados.LE_Nome" ng-required="true" placeholder="Nome" class="form-control border-top" data-toggle="tooltip" data-placement="top" data-trigger="focus" title="Nome"/>
                  </div>
                  <div class="col-xs-12 pad">
                     <input type="text" ng-model="dados.LE_Email" ng-required="true" placeholder="E-mail" class="form-control" data-toggle="tooltip" data-placement="top" data-trigger="focus" title="E-mail"/>
                  </div>
                  <div class="row phone">
                     <div class="col-xs-12 pad">
                        <input type="text" class="form-control" ng-model="dados.LE_Telefone" mask="(99) 9 9999-9999" ng-required="true" placeholder="WhatsApp" data-toggle="tooltip" data-placement="top" data-trigger="focus" title="Telefone">
                     </div>
                  </div>
                  <div class="col-xs-12 pad">
                     <select ng-model="tmp.CarroUsado" ng-required="true" class="form-control" ng-required="true" tabindex="4">
                      <option value="" disabled="disabled">Desejar dar seu Carro usado como Entrada?</option>
                      <option value="Sim">Sim</option>
                      <option value="Não">Não</option>
                    </select>
                  </div>
                  <!-- Deve ser colocado os modelos dentro de uma tag Select -->
                  <div class="col-xs-12 pad">
                    <select ng-model="tmp.EntradaDisponivel" ng-required="true" class="form-control" required="required" tabindex="5">
                      <option value="">Quanto você tem disponível para dar de entrada?</option>
                      <option value="Até 10Mil">Até 10Mil</option>
                      <option value="Mais de 10mil menos de 15mil">Mais de 10mil menos de 15mil</option>
                      <option value="Mais de 15mil menos de 20mil">Mais de 15mil menos de 20mil</option>
                      <option value="Mais de 20mil menos de 30mil">Mais de 20mil menos de 30mil</option>
                      <option value="Mais de 30mil">Mais de 30mil</option>
                      <option value="Somente Seminovo">Somente Seminovo</option>
                    </select>
                  </div>
                   <div class="col-xs-12 pad">
                     <select ng-model="tmp.DataCarroNovo" ng-required="true" class="form-control" required="required" tabindex="6">
                      <option value="">Quando pretende comprar um novo carro?</option>
                      <option value="Em até 15 dias">até 15 dias</option>
                      <option value="Em até 30 dias">até 30 dias</option>
                      <option value="Em até 2 meses">até 2 meses</option>
                      <option value="Em até 3 meses">até 3 meses</option>
                      <option value="Ainda não decidi">Ainda não decidi</option>
                    </select>
                  </div>
                  <div class="col-xs-12 pad">
                     <textarea rows="2" class="form-control" ng-model="tmp.LE_Descricao" placeholder="Mensagem" data-toggle="tooltip" data-placement="top" data-trigger="focus" title="Mensagem"></textarea>
                  </div>
                  <div>
                     <button class="btn" name="submit" ng-disabled="solicitou-cotacao.$invalid || load" ng-click="enviarLead(dados, tmp)" type="submit" id="contact-submit">
                      <b ng-if="form.$invalid">Solicitar Contato</b>
                      <b ng-if="!form.$invalid && !load">Solicitar Agora!</b>    
                      <b ng-if="load">Enviando informações...</b>    
                    </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</aside>
</div>

<link rel="stylesheet" type="text/css" href="http://cdn.marketingmidia9.com.br/css/angular-datepicker.min.css">
<script src="http://cdn.marketingmidia9.com.br/js/angular.min.js"></script>
<script src="http://cdn.marketingmidia9.com.br/js/angular-route.min.js"></script>
<script src="http://cdn.marketingmidia9.com.br/js/ngMask.min.js"></script>
<script src="http://cdn.marketingmidia9.com.br/js/ngDialog.min.js"></script>
<script src='http://cdn.marketingmidia9.com.br/js/sweetalert.min.js'></script>

<script type="text/javascript">
    angular.module('app', ['ngMask', 'ngDialog'])
    .controller('Lead', function($scope, $log, $http, $location, ngDialog, $httpParamSerializerJQLike){
        $log.warn($location.host());
        $scope.load = false;
        $scope.dados = {};
        var host = 'http://crm2.marketingmidia9.com.br'
        var registra_acesso = function() {
            $http.get(host + '/api/registraAcesso/xsCeouZlvuuvm2-bI47zHOek1wFrgkXt6q1N_sVjtsE')
            .success(function(result){
                $log.info(result);
                $scope.request = result.data;
            });

            $http.get('http://ipv4.myexternalip.com/json')
            .success(function(result) { 
              $http.get('http://api.ipinfodb.com/v3/ip-city/?key=20d8cbecc9e0a937c59a9754982bc0a4a76d26ce9b7ce016e2f5276451c96466&ip='+result.ip+'&format=json')
              .success(function(data){
                  /*$log.info(data);*/
                  $scope.meta = data;
              })
            });
        }

        $scope.enviarLead = function(dados, tmp) {
          $scope.load = true;
          $log.info(dados);
          dados.EMP_Key = 'xsCeouZlvuuvm2-bI47zHOek1wFrgkXt6q1N_sVjtsE';
          dados.LE_CodigoTipo = 2;
          dados.LE_CodigoProduto = 240;
          dados.LE_MetaDado = $scope.meta;
          dados.LE_Origem = "Landing Page - Saint Land Natal";
          dados.LE_Descricao = 'Mensagem: ' + tmp.LE_Descricao + '\n' +
                               '-----------Informações Adicionais-----------\n' +
                               'Carro usado na entrada?: ' + tmp.CarroUsado + '\n' +
                               'Valor disponivel para entrada: ' + tmp.EntradaDisponivel + '\n' +
                               'Quando pretende comprar um carro novo: ' + tmp.DataCarroNovo + '\n';

          $http({
            method: 'POST',
            url: host + '/api2/registraLead',
            data:  $httpParamSerializerJQLike(dados),
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            }
          })
         .success(function(retorno){
            $scope.load = false;
            registraLead(dados.LE_Nome, dados.LE_Email, dados.LE_Telefone, tmp.LE_Descricao, dados.LE_Descricao);
            if (!retorno.error) {
              swal({
                title: "Obrigado!",
                text: "suas informações foram enviadas com sucesso, um de nossos colaboradores irá lhe contactar em breve",
                type: "success",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ok",
                closeOnConfirm: false
              },
              function(){
               window.location.href = "https://www.facebook.com/saintlandhyundai/";
              });
            }
            else {
              swal("Ops!", "Ocorreu um problema ao enviar suas informações, tente novamente", "error");
            }
          })
          .error(function(retorno){
            $scope.load = false;
            $log.error(retorno);
          });
         
      }

        $scope.openForm = function(template, tipo) {
          $scope.dados.LE_CodigoTipo = tipo;
          ngDialog.openConfirm({
            template:template,
            scope: $scope,
            width: '100%',
            showClose: false,
            closeByDocument: false,
            closeByEscape: false
          });
        }
        registra_acesso();
    })
    .directive('realTimeCurrency', function ($filter, $locale) {
      var decimalSep = $locale.NUMBER_FORMATS.DECIMAL_SEP;
      var toNumberRegex = new RegExp('[^0-9\\' + decimalSep + ']', 'g');
      var trailingZerosRegex = new RegExp('\\' + decimalSep + '0');
      var filterFunc = function (value) {
          return $filter('currency')(value);
      };
      function getCaretPosition(input){
          if (!input) return 0;
          if (input.selectionStart !== undefined) {
              return input.selectionStart;
          } else if (document.selection) {
              // Curse you IE
              input.focus();
              var selection = document.selection.createRange();
              selection.moveStart('character', input.value ? -input.value.length : 0);
              return selection.text.length;
          }
          return 0;
      }


      function setCaretPosition(input, pos){
          if (!input) return 0;
          if (input.offsetWidth === 0 || input.offsetHeight === 0) {
              return; // Input's hidden
          }
          if (input.setSelectionRange) {
              input.focus();
              input.setSelectionRange(pos, pos);
          }
          else if (input.createTextRange) {
              // Curse you IE
              var range = input.createTextRange();
              range.collapse(true);
              range.moveEnd('character', pos);
              range.moveStart('character', pos);
              range.select();
          }
      }

      function toNumber(currencyStr) {
          return parseFloat(currencyStr.replace(toNumberRegex, ''), 10);
      }


      return {
          restrict: 'A',
          require: 'ngModel',
          link: function postLink(scope, elem, attrs, modelCtrl) {    
              modelCtrl.$formatters.push(filterFunc);
              modelCtrl.$parsers.push(function (newViewValue) {
                  var oldModelValue = modelCtrl.$modelValue;
                  var newModelValue = toNumber(newViewValue);
                  modelCtrl.$viewValue = filterFunc(newModelValue);
                  var pos = getCaretPosition(elem[0]);
                  elem.val(modelCtrl.$viewValue);
                  var newPos = pos + modelCtrl.$viewValue.length -
                                     newViewValue.length;
                  if ((oldModelValue === undefined) || isNaN(oldModelValue)) {
                      newPos -= 3;
                  }
                  setCaretPosition(elem[0], newPos);
                  return newModelValue;
              });
          }
      };
    });
</script>
<!-- CRM REWEB -->
<script>
function getCookie(a){for(var b=a+"=",c=document.cookie.split(";"),d=0;d<c.length;d++){for(var e=c[d];" "==e.charAt(0);)e=e.substring(1);if(0==e.indexOf(b))return e.substring(b.length,e.length)}return""}console.info("Registra Acesso"),setTimeout(function(){var a=document.createElement("script"),b=document.getElementsByTagName("script")[0];a.src=document.location.protocol+"//cdn.reweb-corp.com/rwra.0.0.1.js?"+Math.floor((new Date).getTime()/36e5),a.async=!0,a.type="text/javascript",b.parentNode.insertBefore(a,b)},1),console.info("Get Token");
</script>
<script>
function registraLead(a,b,c,d,e){console.info("Registra Lead");var f=getCookie("rw[token]"),g=new XMLHttpRequest;console.info(g),g.open("POST","http://service.reweb-corp.com/register/lead"),g.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),g.onreadystatechange=function(){4===this.readyState&&(console.log("Status:",this.status),console.log("Headers:",this.getAllResponseHeaders()),console.log("Body:",this.responseText))};var h="token="+f+"&captation_means=Midia9&name="+a+"&email="+b+"&phone="+c+"&message="+d+"&message_html="+e+"&unit_id=CLIENT_UNID_ID&city=NATAL&region=RN&country=LEAD_COUNTRY";g.send(h)}
</script>