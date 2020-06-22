<?php get_header();?>
			<section class="front">
				<div class="contain-front">
				<?php foreach(getBanner() as $post): ?>
					<div class="left-front">
						<div class="front-h1">
							<h1>   <?php echo $post -> post_title?> </h1>
						</div>
						<div class="front-p">
								<p><?php echo $post -> post_content?></p>
						</div>
						<div class="button-order more"><a><span>Узнать подробнее</span></a></div>	
					</div>
					<?php endforeach; ?>	 
				</div>
				<div id="promo">
				<div class="promo">
					<img src="<?php bloginfo('template_directory'); ?>/assets/img/logo1.png" alt="">
					<?php foreach(getPromo() as $post): ?>
					<div class="promo-text">
						<h3><?php echo $post-> post_title ?></h3>
						<p><?php echo $post -> post_content ?></p>
					</div>
					<?php endforeach; ?>
					<div class="promo-forms">
						<div class="promo-forms1">
							<form class="form-promo">
								<div class="form-group">
									<label class="sr-only" for="exampleInputEmail1">Ваш E-mail</label>
	 								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ваш E-mail" name="emailpromo">
								</div>
								<div class="form-group promo-mobile ">
					    		<label class="sr-only" for="exampleInputEmail2">Ваш промокод</label>
									<input type="text" class="form-control" id="exampleInputEmail2" placeholder="Промокод" name="promocode" value="" maxlength="9">
								</div>
								
								<button type="submit" class="btn btn-default radius button-submit" >Получить промокод</button>
							<div class="checkbox">
							<label>
								<input type="checkbox" class="access" style="width: 20px"> <span>Согласен(а) на обработку персональных данных </span>
								</label>
								</div>
								
							</form>
						</div>
						<div class="promo-forms2">
							<form>
			   <div class="form-group">
					<label class="sr-only" for="exampleInputEmail3">Ваш промокод</label>
					<input type="text" class="form-control" id="exampleInputEmail3" placeholder="Промокод" name="promocode" value="" maxlength="9">
				</div>
				<p>С Уважением, ИП Филоненко А.В. </p>
							</form>
						</div>
					</div>		
				</div>
				<div class="shadow-popup"></div>
				</div>
			</section>
			<section class="calculator-cost">	
				<?php foreach(getCalculator() as $calc): ?>
				<div class="contain-calculator-cost" id="calc">
					<div class="calc-naming">
						<h2>Калькулятор расчёта стоимости</h2>
					</div>
					<div class="calculator">
						<div class="elem-calc emhover" data-cost1="">
							<div class="icon-calc">
								<div><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/parking1.svg " alt=""></div>
							</div>
							<div class="top">
								<h3>АВТОМОБИЛЬНАЯ <br/>ПЛОЩАДКА</h3>
							</div>
							<div class="top">
								<div class="calc"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/add-circular-outlined-button.svg" alt=""><p>Подготовка усиленного основания</p></div>
								<div class="calc description"><img  src="<?php bloginfo('template_directory'); ?>/assets/img/icons/add-circular-outlined-button.svg" alt=""><p>Работы по укладке</p></div>
								<div class="calc description"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/no-circular-outlined-button.svg " alt=""><p>Плитка не входит<br/> в стоимость</p></div>
							</div>
							<div class="top white-cost">
								<p ><span>от </span><span class="data-cost1"><?php echo $calc['car_spaces'] ?></span> руб/м<sup>2</sup></p>
							</div>
						</div>
						<div class="elem-calc emhover ec-top2" data-cost2="">
							<div class="icon-calc">
								<div><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/pedestrian-crossing1.svg " alt=""></div>
							</div>
							<div class="top">
								<h3>ПЕШЕХОДНАЯ <br/>ЗОНА</h3>
							</div>
							<div class="top">
								<div class="calc"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/add-circular-outlined-button.svg" alt=""><p>Подготовка усиленного основания</p></div>
								<div class="calc description"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/add-circular-outlined-button.svg" alt=""><p>Работы по укладке</p></div>
								<div class="calc description"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/no-circular-outlined-button.svg " alt=""><p>Плитка не входит<br/> в стоимость</p></div>
							</div>
							<div class="top white-cost">
								<p><span>от </span><span class="data-cost2"><?php echo $calc['area_walking'] ?></span> руб/м<sup>2</sup></p>
							</div>
						</div>
						<div class="elem-calc emhover ec-top ec-top2 gradient" data-cost3="">
							<div class="icon-calc">
								<div><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/road-work1.svg " alt=""></div>
							</div>
							<div class="top">
								<h3>НА ГОТОВОЕ <br/>ОСНОВАНИЕ</h3>
							</div>
							<div class="top">
								<div class="calc"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/add-circular-outlined-button.svg" alt=""><p>Подготовка усиленного основания</p></div>
								<div class="calc description"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/add-circular-outlined-button.svg" alt=""><p>Работы по укладке</p></div>
								<div class="calc description"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/no-circular-outlined-button.svg " alt=""><p>Плитка не входит<br/> в стоимость</p></div>
							</div>
							<div class="top white-cost">
								<p ><span>от </span><span class="data-cost3"><?php echo $calc['ready_bottom'] ?></span> руб/м<sup>2</sup></p>
							</div>
						</div>
						
						<div class="elem-calc elem-calc-4 ec-top ec-top2">
							<div class="cost-elem-calc">
								<div class="center-calc">
									<div class="left-calc">
										<p style="font-size: 16px"><?php echo $calc['metr']  ?></p>
										<p style="font-size: 16px"><span class="value-data-cost"><?php echo $calc['costmetr'] ?></span> руб.</p>
									</div>
									<div class="right-calc">
										<div class="event-calc" style="display: flex; flex-direction: column;">
										   <div class="plus" name="plus"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/add-active.svg " alt=""></div>
										   <div class="minus" name="minus" style="margin-top: 2px"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/none-active.svg " alt=""></div>
										</div>
										<div class="sum">
											<input type="text" style="border: none; outline: none; width: 33px" min="0" name="quantity" class="summer" value="0" />
										</div>
									</div>
								</div>
							</div>
							<div class="cost-elem-calc cec">
								<div class="center-calc">
									<div class="left-calc">
										<p style="font-size: 16px"><?php echo $calc['tech1'] ?></p>
										<p style="font-size: 16px"><span class="value-data-cost1"><?php echo $calc['cost_tech1'] ?></span> руб.</p>
									</div>
									<div class="right-calc">
										<div class="event-calc" style="display: flex; flex-direction: column;">
											<div class="plus" name="plus1"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/add-active.svg " alt=""></div>
											<div class="minus" name="minus1" style="margin-top: 2px"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/none-active.svg " alt=""></div>
										</div>
										<div class="sum">
											<input type="text" style="border: none; outline: none; width: 33px"  min="0" data-summ1="" name="quantity" class="summer1" value="0"/>
										</div>
									</div>
								</div>
							</div>
							<div class="cost-elem-calc cec">
								<div class="center-calc">
									<div class="left-calc">
										<p style="font-size: 16px"><?php echo $calc['tech2'] ?></p>
										<p style="font-size: 16px"><span class="value-data-cost2"><?php echo $calc['cost_tech2'] ?></span> руб.</p>
									</div>
									<div class="right-calc">
										<div  class="event-calc" style="display: flex; flex-direction: column;">
											<div class="plus" name="plus2"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/add-active.svg " alt=""></div>
											<div class="minus" name="minus2"style="margin-top: 2px"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/none-active.svg " alt=""></div>
										</div>
										<div class="sum">
											<input type="text" style="border: none; outline: none; width: 33px" min="0" name="quantity" class="summer2" value="0"/>
										</div>
									</div>
								</div>
							</div>
							<div class="cost-elem-calc cec">
								<div class="center-calc">
									<div class="left-calc">
										<p style="font-size: 16px"><?php echo $calc['tech3'] ?></p>
										<p style="font-size: 16px"><span class="value-data-cost3"><?php echo $calc['cost_tech3'] ?></span> руб.</p>
									</div>
									<div class="right-calc">
										<div  class="event-calc" style="display: flex; flex-direction: column;">
											<div class="plus" name="plus3"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/add-active.svg " alt=""></div>
											<div class="minus" name="minus3"style="margin-top: 2px"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/none-active.svg " alt=""></div>
										</div>
										<div class="sum">
											<input type="text" style="border: none; outline: none; width: 33px" min="0" name="quantity" class="summer3" value="0"/>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="result">
						<div class="left-result">
							<div class="master-forms result-forms">
									<form class="form-inline my-form" id="ajax2">
										<div class="form-group fail elem-form ">
											<label class="sr-only" for="exampleInputEmail4">Ваше имя</label>
											<input type="text" class="form-control" id="exampleInputEmail4" placeholder="Ваше имя" name="name">
										</div>
										<div class="form-group fail elem-form addwrong2 ">
											<label class="sr-only" for="exampleInputPassword1">Телефон</label>
											<input type="text" class="form-control number number-popup" id="exampleInputPassword1" placeholder="Телефон" name="phone">
										</div>
										<div class="top-but">
											<textarea class="form-control get-fc" rows="5" placeholder="Ваши пожелания"></textarea>
											<div class="but">
										<button type="submit" class="btn btn-default radius button-submit">Отправить расчёт</button>
												<div class="checkbox result-form">
													<label>
													<input type="checkbox" class="access" style="width: 20px"> <span>Согласен(а) на обработку персональных данных </span>
													</label>
												</div>
											</div>
										</div>		
									</form>								  
								</div>
								<?php endforeach; ?>
						</div>
						<div class="right-result">
							<div class="center-right-result">
								<div class="img-result">
									<img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/abacus.svg" alt="">
								</div>
								<div class="result-cost">
									<h3>Итоговая стоимость:</h3>
									<p><span class="result-pay"> 0 </span> руб.</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
			<section class="cost-tile">
				<div class="contain-cost-tile">
					<div class="naming-cost-tile" id="nct">
						<h2>СТОИМОСТЬ УКЛАДКИ ТРОТУАРНОЙ ПЛИТКИ</h2>
					</div>
					<div class="cost-table">
					<?php echo do_shortcode('[table id=costing /]') ?>
					</div>
				</div>
			</section>
			<section class="faq">
				<div class="contain-faq" >
						<div class="only-faq gradient" id="faq">
							<div class="faq-h2">
								<h2>ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ</h2>
							</div>
							<?php foreach( getFaq() as $post ): ?>
								<div class="center-faq">
										<div class="fq">
											<div class="faq-toggle">
												<div class="triple">
													<div class="one"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/information.svg " alt=""></div>
													<div class="two"><span> <?php echo $post -> post_title?></span></div>
													<div class="one rotate"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/down-arrow.svg " alt=""></div>
												</div>
												<p class="faq-p"><?php echo $post -> post_content?></p>
											</div>
										</div>
									</div>
							<?php endforeach; ?>			
						</div> 
					<div class="img-faq"></div>
				</div>
			</section>
			<section class="portfolio">
				<div class="contain-portfolio" id="portfolio">
					<div class="boxs-portfolio">
						<div class="examples">
							<h2>ПРИМЕРЫ НАШИХ РАБОТ</h2>
						</div>
                                                <?php foreach(getPortfolio() as $port): ?>
						<div class="boxs">
								<div class="along data-hover" ><img src="<?php echo $port['object1']['url'] ?>" alt="">
									<div class="hover-boxs">
										<div class="discription">
                                         <?php get_template_part( 'phphovertemplates/hover' ); ?>
										</div>
									</div>
								</div>
								<div class="four">
									<div class="both">
										<div class="elem-four data-hover ef1" ><img src="<?php echo $port['object2']['url'] ?>" alt="">
											<div class="hover-boxs">
													<div class="discription">
														 <?php get_template_part( 'phphovertemplates/hover1' ); ?>
													</div>
												</div>
										</div>
										<div class="elem-four data-hover ef ef2"><img src="<?php echo $port['object3']['url'] ?>" alt="">
											<div class="hover-boxs">
													<div class="discription">
														 <?php get_template_part( 'phphovertemplates/hover2' ); ?>
													</div>
												</div>
										</div>
									</div>
									<div class="both l">
										<div class="elem-four data-hover ef3"><img src="<?php echo $port['object4']['url'] ?>" alt="">
											<div class="hover-boxs">
													<div class="discription">
                                                       <?php get_template_part( 'phphovertemplates/hover3' ); ?>
													</div>
												</div>
										</div>
										<div class="elem-four data-hover ef ef4"><img src="<?php echo $port['object5']['url'] ?>" alt="">
											<div class="hover-boxs">
													<div class="discription">
                                                      <?php get_template_part( 'phphovertemplates/hover4' ); ?>
													</div>
												</div>
										</div>
									</div>
								</div>
							<div class="across">
								<div class="elem-across data-hover ee"><img src="<?php echo $port['object6']['url'] ?>" alt="">
									<div class="hover-boxs">
											<div class="discription">
 												<?php get_template_part( 'phphovertemplates/hover5' ); ?>
											</div>
										</div>
								</div>
								<div class="elem-across data-hover ea"><img src="<?php echo $port['object7']['url'] ?>" alt="">
									<div class="hover-boxs">
											<div class="discription">
 												<?php get_template_part( 'phphovertemplates/hover6' ); ?>
											</div>
										</div>
								</div>
							</div>
             <?php endforeach; ?>
						</div> 
					<div class="features">
						<div class="contein-features" id="featuress">
							<div class="img-tile"><?php  getThumbnail232(); ?></div>
							<div class="features-company">
								<div class="naming-features"><h2><?php title232(); ?></h2></div>
								<div class="five-features">
									<div class="elem-features">
										<div class="img-features"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/insurance.svg" alt=""></div>
										<div class="discription-features">
											<h3><?php title225() ?></h3>
											<p><?php content225() ?></p>
										</div>
									</div>
									<div class="elem-features">
										<div class="img-features"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/wallet.svg" alt=""></div>
										<div class="discription-features">
											<h3><?php title226() ?></h3>
											<p><?php  content226() ?></p>
										</div>
									</div>
									<div class="elem-features">
										<div class="img-features"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/guarantee.svg" alt=""></div>
										<div class="discription-features">
											<h3><?php title229() ?></h3>
											<p><?php content229() ?></p>
										</div>
									</div>
									<div class="elem-features">
										<div class="img-features"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/save-money.svg" alt=""></div>
										<div class="discription-features">
											<h3><?php title230() ?></h3>
											<p><?php content230() ?></p>
										</div>
									</div>
									<div class="elem-features special-p">
										<div class="img-features"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/authentication.svg" alt=""></div>
										<div class="discription-features ">
										  <h3><?php title231() ?></h3>
											<p><?php content231() ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="popup-slider">

					<div class="shadow-popup"></div>
				        </div>	
			</section>
			<section class="master gradient">
				<div class="contain-master">
					<div class="call-master"><span>ЗАКАЗАТЬ БЕСПЛАТНЫЙ ВЫЗОВ МАСТЕРА</span></div>
					<div class="master-forms">
						<div class="center-form">
							<form class="form-inline form-center" id="ajax1">					
								<div class="form-group elem-form sf">
									<label class="sr-only" for="exampleInputEmail5">Ваше имя</label>
									<input type="text" class="form-control" id="exampleInputEmail5" placeholder="Ваше имя" name="name">
								</div>
								<div class="form-group elem-form sf addwrong1">
									<label class="sr-only" for="exampleInputPassword2">Телефон</label>
									<input type="text" class="form-control number number-popup" id="exampleInputPassword2" placeholder="Телефон" name="phone">
								</div>
								<button type="submit" class="btn btn-default radius button-submit">Отправить заявку</button>
								<div class="checkbox elem-form wtf">
									<label>
									<input type="checkbox" class="access" style="width: 20px"/> <span>Согласен(а) на обработку персональных данных </span>
									</label>
								</div>	
							</form>	
						</div>							  
					</div>
				</div>
			</section>
<?php get_footer(); ?>