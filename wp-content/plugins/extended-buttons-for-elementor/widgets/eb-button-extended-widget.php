<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Curve Text Widget
 */
class EB_Button_Extended extends Widget_Base {

	/**
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eb-button-extended';
	}

	/**
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Button Extended', 'elementor' );
	}

	/**
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-button eb-button-icon';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'eb-elementor-extended' ];
	}

	public function get_script_depends() {
		return [ 'eb-button' ];
	}


	/**
	 * Retrieve button sizes.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return array An array containing button sizes.
	 */
	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'elementor' ),
			'sm' => __( 'Small', 'elementor' ),
			'md' => __( 'Medium', 'elementor' ),
			'lg' => __( 'Large', 'elementor' ),
			'xl' => __( 'Extra Large', 'elementor' ),
		];
	}


	public static function get_transitions() {
		return [
			'' => __( 'None', 'elementor' ),
			'sweep-to-right' => __( 'Sweep To Right', 'elementor' ),
			'sweep-to-left' => __( 'Sweep To Left', 'elementor' ),
			'sweep-to-bottom' => __( 'Sweep To Bottom', 'elementor' ),
			'sweep-to-top' => __( 'Sweep To Top', 'elementor' ),
			'bounce-to-right' => __( 'Bounce To Right', 'elementor' ),
			'bounce-to-left' => __( 'Bounce To Left', 'elementor' ),
			'bounce-to-bottom' => __( 'Bounce To Bottom', 'elementor' ),
			'bounce-to-top' => __( 'Bounce To Top', 'elementor' ),
			'radial-out' => __( 'Radial Out', 'elementor' ),
			'radial-in' => __( 'Radial In', 'elementor' ),
			'rectangle-in' => __( 'Rectangle In', 'elementor' ),
			'rectangle-out' => __( 'Rectangle Out', 'elementor' ),
			'shutter-in-horizontal' => __( 'Shutter In Horizontal', 'elementor' ),
			'shutter-out-horizontal' => __( 'Shutter Out Horizontal', 'elementor' ),
			'shutter-in-vertical' => __( 'Shutter In Vertical', 'elementor' ),
			'shutter-out-vertical' => __( 'Shutter Out Vertical', 'elementor' ),
		];
	}

	/**
	 * Register button widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button #1', 'elementor' ),
			]
		);

		$this->add_control(
			'button_type',
			[
				'label' => __( 'Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Default', 'elementor' ),
					'info' => __( 'Info', 'elementor' ),
					'success' => __( 'Success', 'elementor' ),
					'warning' => __( 'Warning', 'elementor' ),
					'danger' => __( 'Danger', 'elementor' ),
				],
				'prefix_class' => 'elementor-button-',
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Button One', 'elementor' ),
				'placeholder' => __( 'Button One', 'elementor' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button_sizes(),
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => __( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'elementor' ),
					'right' => __( 'After', 'elementor' ),
				],
				'condition' => [
					'icon!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label' => __( 'Icon Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button-one .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-button-one .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->add_control(
			'button_one_animation_type',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::ANIMATION,
				'default' => '',
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_one_animation_duration',
			[
				'label' => __( 'Animation Duration', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'slow' => __( 'Slow', 'elementor' ),
					'normal' => __( 'Normal', 'elementor' ),
					'fast' => __( 'Fast', 'elementor' ),
				],
				'condition' => [
					'button_one_animation_type!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'button_one_right_space',
			[
				'label' => __( 'Right Spacing', 'elementor' ),
				'description' => __( 'If you are not using the separator, you can use this to adjust the gap on the right.', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button-one' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_separator',
			[
				'label' => __( 'Button Separator Text', 'elementor' ),
			]
		);

		$this->add_control(
			'separator_text',
			[
				'label' => __( 'Separator Text', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Separator Text', 'elementor' ),
				'default' => __( 'or', 'elementor' ),
			]
		);

		$this->add_control(
			'separator_new_row',
			[
				'label' => esc_html__( 'Separator on a new row on Mobile', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'separator_remove_text',
			[
				'label' => esc_html__( 'Hide Separator Text on Mobile', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->add_responsive_control(
			'separator_text_space',
			[
				'label' => __( 'Spacing', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eb-button-separator' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'separator_animation_type',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::ANIMATION,
				'default' => '',
				'label_block' => true,
			]
		);

		$this->add_control(
			'separator_animation_duration',
			[
				'label' => __( 'Animation Duration', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'slow' => __( 'Slow', 'elementor' ),
					'normal' => __( 'Normal', 'elementor' ),
					'fast' => __( 'Fast', 'elementor' ),
				],
				'condition' => [
					'separator_animation_type!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button_two',
			[
				'label' => __( 'Button #2', 'elementor' ),
			]
		);

		$this->add_control(
			'button_type_two',
			[
				'label' => __( 'Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Default', 'elementor' ),
					'info' => __( 'Info', 'elementor' ),
					'success' => __( 'Success', 'elementor' ),
					'warning' => __( 'Warning', 'elementor' ),
					'danger' => __( 'Danger', 'elementor' ),
				],
				'prefix_class' => 'elementor-button-',
			]
		);

		$this->add_control(
			'text_two',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Button Two', 'elementor' ),
				'placeholder' => __( 'Button Two', 'elementor' ),
			]
		);

		$this->add_control(
			'link_two',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);


		$this->add_control(
			'size_two',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button_sizes(),
			]
		);

		$this->add_control(
			'icon_two',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);

		$this->add_control(
			'icon_align_two',
			[
				'label' => __( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'elementor' ),
					'right' => __( 'After', 'elementor' ),
				],
				'condition' => [
					'icon!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent_two',
			[
				'label' => __( 'Icon Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button-two .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-button-two .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'view_two',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->add_control(
			'button_two_animation_type',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::ANIMATION,
				'default' => '',
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_two_animation_duration',
			[
				'label' => __( 'Animation Duration', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'slow' => __( 'Slow', 'elementor' ),
					'normal' => __( 'Normal', 'elementor' ),
					'fast' => __( 'Fast', 'elementor' ),
				],
				'condition' => [
					'button_two_animation_type!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'button_two_left_space',
			[
				'label' => __( 'Left Spacing', 'elementor' ),
				'description' => __( 'If you are not using the separator, you can use this to adjust the gap on the left.', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button-two' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button_overall',
			[
				'label' => __( 'Button Settings', 'elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

		$this->add_control(
			'button_fullwidth_mobile',
			[
				'label' => esc_html__( 'Button Fullwidth on Mobile', 'elementor' ),
				'description' => esc_html__( 'This will make both your buttons fullwidth on mobile.', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Button #1', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} a.elementor-button-one, {{WRAPPER}} .elementor-button-one',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-one, {{WRAPPER}} .elementor-button-one' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-one, {{WRAPPER}} .elementor-button-one' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-one:hover, {{WRAPPER}} .elementor-button-one:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-one:hover, {{WRAPPER}} .elementor-button-one:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-one:hover, {{WRAPPER}} .elementor-button-one:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_background_transition',
			[
				'label' => __( 'Background Transition', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => self::get_transitions(),
				'label_block' => true,
			]
		);

		$this->add_control(
			'background_transition_hover_color',
			[
				'label' => __( 'Background Transition Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-one:before, {{WRAPPER}} .elementor-button-one:before' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'hover_background_transition!' => '',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .elementor-button-one',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-one, {{WRAPPER}} .elementor-button-one' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .elementor-button-one',
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-one, {{WRAPPER}} .elementor-button-one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_separator_style',
			[
				'label' => __( 'Separator Text Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'separator_style',
			[
				'label' => __( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eb-button-separator' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'separator_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eb-button-separator' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'separator_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eb-button-separator',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'separator_text_shadow',
				'selector' => '{{WRAPPER}} .eb-button-separator',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'separator_border',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .eb-button-separator',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'separator_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eb-button-separator' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'separator_button_box_shadow',
				'selector' => '{{WRAPPER}} .eb-button-separator',
			]
		);

		$this->add_control(
			'separator_padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eb-button-separator' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_two',
			[
				'label' => __( 'Button #2', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_two',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} a.elementor-button-two, {{WRAPPER}} .elementor-button-two',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style_two' );

		$this->start_controls_tab(
			'tab_button_normal_two',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'button_text_color_two',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-two, {{WRAPPER}} .elementor-button-two' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color_two',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-two, {{WRAPPER}} .elementor-button-two' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover_two',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'hover_color_two',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-two:hover, {{WRAPPER}} .elementor-button-two:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color_two',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-two:hover, {{WRAPPER}} .elementor-button-two:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color_two',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-two:hover, {{WRAPPER}} .elementor-button-two:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_background_transition_two',
			[
				'label' => __( 'Background Transition', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => self::get_transitions(),
				'label_block' => true,
			]
		);

		$this->add_control(
			'background_transition_hover_color_two',
			[
				'label' => __( 'Background Transition Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-two:before, {{WRAPPER}} .elementor-button-two:before' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'hover_background_transition_two!' => '',
				],
			]
		);

		$this->add_control(
			'hover_animation_two',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_two',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .elementor-button-two',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius_two',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button-two, {{WRAPPER}} .elementor-button-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_two',
				'selector' => '{{WRAPPER}} .elementor-button-two',
			]
		);

		$this->add_control(
			'text_padding_two',
			[
				'label' => __( 'Text Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		$this->add_render_attribute( 'wrapper', 'class', 'elementor-button-wrapper' );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );
			$this->add_render_attribute( 'button', 'class', 'elementor-button-link' );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'button', 'rel', 'nofollow' );
			}
		}

		$this->add_render_attribute( 'button', 'class', 'elementor-button elementor-button-one' );

		if ( ! empty( $settings['size'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['size'] );
		}

		if ( $settings['hover_animation'] ) {
			$this->add_render_attribute( 'button', 'class', 'eb-hover elementor-animation-' . $settings['hover_animation'] );
		}

		if ( $settings['hover_background_transition'] ) {
			$this->add_render_attribute( 'button', 'class', 'eb-hover-background-transition eb-' . $settings['hover_background_transition'] );
		}


		if ( $settings['button_one_animation_type'] ) {
			$this->add_render_attribute( 'button', 'class', 'animated ' . $settings['button_one_animation_type'] );
		}

		if ( 'yes' == $settings['button_fullwidth_mobile'] ) {
			$this->add_render_attribute( 'button', 'class', 'eb-button-fullwidth' );
		}		

		/*Two*/
		if ( ! empty( $settings['link_two']['url'] ) ) {
			$this->add_render_attribute( 'button_two', 'href', $settings['link_two']['url'] );
			$this->add_render_attribute( 'button_two', 'class', 'elementor-button-link' );

			if ( $settings['link_two']['is_external'] ) {
				$this->add_render_attribute( 'button_two', 'target', '_blank' );
			}

			if ( $settings['link_two']['nofollow'] ) {
				$this->add_render_attribute( 'button_two', 'rel', 'nofollow' );
			}
		}

		$this->add_render_attribute( 'button_two', 'class', 'elementor-button elementor-button-two' );

		if ( ! empty( $settings['size_two'] ) ) {
			$this->add_render_attribute( 'button_two', 'class', 'elementor-size-' . $settings['size_two'] );
		}

		if ( $settings['hover_animation_two'] ) {
			$this->add_render_attribute( 'button_two', 'class', 'eb-hover elementor-animation-' . $settings['hover_animation_two'] );
		}

		if ( $settings['hover_background_transition_two'] ) {
			$this->add_render_attribute( 'button_two', 'class', 'eb-hover-background-transition eb-' . $settings['hover_background_transition_two'] );
		}

		if ( $settings['button_two_animation_type'] ) {
			$this->add_render_attribute( 'button_two', 'class', 'animated ' . $settings['button_two_animation_type'] );
		}

		if ( 'yes' == $settings['button_fullwidth_mobile'] ) {
			$this->add_render_attribute( 'button_two', 'class', 'eb-button-fullwidth' );
		}

		?>
		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
				<?php $this->render_text(); ?>
			</a>
			<?php if ( ! empty( $settings['separator_text'] ) ) {?>
			<div class="eb-button-separator<?php if ( 'yes' == $settings['separator_new_row'] ) { ?> eb-button-separator-m<?php } ?><?php if ( 'yes' == $settings['separator_remove_text'] ) { ?> eb-button-separator-remove<?php } ?><?php if ( 'yes' == $settings['separator_animation_type'] ) { ?> animated <?php echo $settings['separator_animation_type']; ?><?php } ?><?php if ( 'normal' !== $settings['separator_animation_duration'] ) { ?> animated-<?php echo $settings['separator_animation_duration']; ?><?php } ?>"><?php echo $settings['separator_text']; ?></div>
			<?php } ?>
			<a <?php echo $this->get_render_attribute_string( 'button_two' ); ?>>
				<?php $this->render_text_two(); ?>
			</a>
		</div>
		<?php
	}

	/**
	 * Render button widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<div class="elementor-button-wrapper">
			<a class="elementor-button elementor-button-one elementor-size-{{ settings.size }} <# if ( settings.hover_background_transition !== '' ) { #>eb-hover-background-transition eb-{{ settings.hover_background_transition }}<# } #> elementor-animation-{{ settings.hover_animation }}<# if ( settings.button_one_animation_type ) { #> animated {{ settings.button_one_animation_type }}<# } #><# if ( 'normal' !== settings.button_one_animation_duration ) { #> animated-{{ settings.button_one_animation_duration }}<# } #><# if ( 'yes' == settings.button_fullwidth_mobile ) {#> eb-button-fullwidth<#}#>" href="{{ settings.link.url }}">
				<span class="elementor-button-content-wrapper">
					<# if ( settings.icon ) { #>
					<span class="elementor-button-icon elementor-align-icon-{{ settings.icon_align }}">
						<i class="{{ settings.icon }}"></i>
					</span>
					<# } #>
					<span class="elementor-button-text elementor-inline-editing" data-elementor-setting-key="text" data-elementor-inline-editing-toolbar="none">{{{ settings.text }}}</span>
				</span>
			</a>
			<# if ( settings.separator_text ) { #>
			<div class="eb-button-separator<# if ( 'yes' == settings.separator_new_row ) {#> eb-button-separator-m<#}#><# if ( 'yes' == settings.separator_remove_text ) {#> eb-button-separator-remove<#}#><# if ( settings.separator_animation_type ) { #> animated {{ settings.separator_animation_type }}<# } #><# if ( 'normal' !== settings.separator_animation_duration ) { #> animated-{{ settings.separator_animation_duration }}<# } #>">{{{ settings.separator_text }}}</div>
			<# } #>
			<a class="elementor-button elementor-button-two elementor-size-{{ settings.size_two }} <# if ( settings.hover_background_transition_two !== '' ) { #>eb-hover-background-transition eb-{{ settings.hover_background_transition_two }}<# } #> elementor-animation-{{ settings.hover_animation_two }}<# if ( settings.button_two_animation_type ) { #> animated {{ settings.button_two_animation_type }}<# } #><# if ( 'normal' !== settings.button_two_animation_duration ) { #> animated-{{ settings.button_two_animation_duration }}<# } #><# if ( 'yes' == settings.button_fullwidth_mobile ) {#> eb-button-fullwidth<#}#>" href="{{ settings.link_two.url }}">
				<span class="elementor-button-content-wrapper">
					<# if ( settings.icon_two ) { #>
					<span class="elementor-button-icon elementor-align-icon-{{ settings.icon_align_two }}">
						<i class="{{ settings.icon_two }}"></i>
					</span>
					<# } #>
					<span class="elementor-button-text elementor-inline-editing" data-elementor-setting-key="text_two" data-elementor-inline-editing-toolbar="none">{{{ settings.text_two }}}</span>
				</span>
			</a>
		</div>
		<?php
	}

	/**
	 * Render button widget text.
	 *
	 * @since 1.5.0
	 * @access protected
	 */
	protected function render_text() {
		$settings = $this->get_settings();
		$this->add_render_attribute( 'content-wrapper', 'class', 'elementor-button-content-wrapper' );
		$this->add_render_attribute( 'icon-align', 'class', 'elementor-align-icon-' . $settings['icon_align'] );
		$this->add_render_attribute( 'icon-align', 'class', 'elementor-button-icon' );

		$this->add_render_attribute( 'text', 'class', 'elementor-button-text' );

		$this->add_inline_editing_attributes( 'text', 'none' );
		?>
		<span <?php echo $this->get_render_attribute_string( 'content-wrapper' ); ?>>
			<?php if ( ! empty( $settings['icon'] ) ) : ?>
			<span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
				<i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
			</span>
			<?php endif; ?>
			<span <?php echo $this->get_render_attribute_string( 'text' ); ?>><?php echo $settings['text']; ?></span>
		</span>
		<?php
	}

	protected function render_text_two() {
		$settings = $this->get_settings();
		$this->add_render_attribute( 'content-wrapper', 'class', 'elementor-button-content-wrapper' );
		$this->add_render_attribute( 'icon-align', 'class', 'elementor-align-icon-' . $settings['icon_align_two'] );
		$this->add_render_attribute( 'icon-align', 'class', 'elementor-button-icon' );

		$this->add_render_attribute( 'text_two', 'class', 'elementor-button-text' );

		$this->add_inline_editing_attributes( 'text_two', 'none' );
		?>
		<span <?php echo $this->get_render_attribute_string( 'content-wrapper' ); ?>>
			<?php if ( ! empty( $settings['icon_two'] ) ) : ?>
			<span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
				<i class="<?php echo esc_attr( $settings['icon_two'] ); ?>"></i>
			</span>
			<?php endif; ?>
			<span <?php echo $this->get_render_attribute_string( 'text_two' ); ?>><?php echo $settings['text_two']; ?></span>
		</span>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new EB_Button_Extended() );