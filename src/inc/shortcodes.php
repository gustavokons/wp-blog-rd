<?php
    function create_shortcode_index($params = array()) {
        extract(shortcode_atts(array(
            'title' => 'Índice'
        ), $params));
        wp_enqueue_script('script-index', get_template_directory_uri().'/js/post-index.js', array ( 'jquery' ), 1.02, true);

        return '<div class="container-summary"><span class="blog-index">'.$title.'</span></div>';
    }
    add_shortcode('index', 'create_shortcode_index');

    function create_shortcode_conversion_form($params = array(), $content = null) {
        extract(shortcode_atts(array(
            'identifier'  => '',
            'redirect_to' => '',
            'title'       => '',
            'description' => '',
            'image_url'   => '',
            'btn_text'    => 'Receber material'
        ), $params));

        wp_enqueue_script('script-index', get_template_directory_uri().'/js/utm-tracker.js', array ( 'jquery' ), 1.01, true);

        $html = '<form id="conversion-form" style="padding-top: 0px;" action="https://www.rdstation.com.br/api/1.2/conversions" method="POST">
                    <input name="token_rdstation" type="hidden" value="4ac98d510af23fd1b39770575544b8e0" /><br/>
                    <input name="identificador" type="hidden" value="'.$identifier.'" /><br/>
                    <input name="redirect_to" type="hidden" value="'.$redirect_to.'" />
                    <header>
                        <h2>'.$title.'</h2>
                        '.$description.'
                    </header>
                    <section>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input id="name" class="form-control" name="name" required="" type="text" value="" placeholder="Nome" />
                                </div>
                                <div class="form-group">
                                    <input id="email" class="form-control" name="email" required="" type="email" value="" placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <select id="custom_fields_11228" class="form-control" name="custom_fields[11228]" required="">
                                        <option disabled="disabled" selected="selected" value="">Selecione seu cargo</option>
                                        <option value="Analista de marketing">Analista de marketing</option>
                                        <option value="Gerente/Coordenador de Marketing">Gerente/Coordenador de Marketing</option>
                                        <option value="Gerente/Coordenador de Vendas">Gerente/Coordenador de Vendas</option>
                                        <option value="Diretor">Diretor</option>
                                        <option value="Sócio / CEO">Sócio / CEO</option>
                                        <option value="Outros Cargos">Outros Cargos</option>
                                        <option value="Estudante">Estudante</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="custom_fields_98" class="form-control" name="custom_fields[98]" required="">
                                        <option disabled="disabled" selected="selected" value="">Selecione a Área de atuação da empresa</option>
                                        <option value="Software e Cloud">Software e Cloud</option>
                                        <option value="Telecomunicações">Telecomunicações</option>
                                        <option value="Educação">Educação</option>
                                        <option value="Agência">Agência</option>
                                        <option value="Consultoria">Consultoria</option>
                                        <option value="Veículo de comunicação">Veículo de comunicação</option>
                                        <option value="Serviços para o consumidor">Serviços para o consumidor</option>
                                        <option value="Hardware">Hardware</option>
                                        <option value="Serviços corporativos">Serviços corporativos</option>
                                        <option value="Turismo e Lazer">Turismo e Lazer</option>
                                        <option value="Saúde">Saúde</option>
                                        <option value="Ecommerce">Ecommerce</option>
                                        <option value="Indústria de manufatura">Indústria de manufatura</option>
                                        <option value="RH e Recrutamento">RH e Recrutamento</option>
                                        <option value="Serviços financeiros">Serviços financeiros</option>
                                        <option value="Jurídico">Jurídico</option>
                                        <option value="Imóveis">Imóveis</option>
                                        <option value="Eventos">Eventos</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="custom_fields_99" class="form-control" name="custom_fields[99]" required="">
                                        <option disabled="disabled" selected="selected" value="">Selecione o Número de Funcionários</option>
                                        <option value="1">1</option>
                                        <option value="2-3">2-3</option>
                                        <option value="4-10">4-10</option>
                                        <option value="11-50">11-50</option>
                                        <option value="51-200">51-200</option>
                                        <option value="Mais de 200">Mais de 200</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input id="website" class="form-control" name="website" required="" type="text" value="" placeholder="Website" />
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <img style="margin-top: 56px;" src="'.$image_url.'" alt="" />
                            </div>
                        </div>
                        <div class="row">
                            <div style="text-align: center; padding-left: 14px; padding-right: 14px;">
                                <button class="btn btn-primary" style="width: 100%; padding: 8px; font-size: 18px;" type="submit">'.$btn_text.'</button>
                            </div>
                        </div>
                    </section>
                </form>';

        return $html;
    }
    add_shortcode('conversion-form', 'create_shortcode_conversion_form');


?>
