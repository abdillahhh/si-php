/* global Chart:false */

$(function () {
     'use strict';

     var ticksStyle = {
          fontColor: '#495057',
          fontStyle: 'bold',
     };

     var mode = 'index';
     var intersect = true;

     var $visitorsChart = $('#visitors-chart');
     // eslint-disable-next-line no-unused-vars
     var visitorsChart = new Chart($visitorsChart, {
          data: {
               labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
               datasets: [
                    {
                         type: 'line',
                         data: [100, 120, 170, 167, 180, 177, 160],
                         backgroundColor: 'transparent',
                         borderColor: '#3C4B64',
                         pointBorderColor: '#3C4B64',
                         pointBackgroundColor: '#3C4B64',
                         fill: false,
                         // pointHoverBackgroundColor: '#3C4B64',
                         // pointHoverBorderColor    : '#3C4B64'
                    },
                    {
                         type: 'line',
                         data: [60, 80, 70, 67, 80, 277, 100],
                         backgroundColor: 'tansparent',
                         borderColor: '#E2D7E1',
                         pointBorderColor: '#E2D7E1',
                         pointBackgroundColor: '#E2D7E1',
                         fill: false,
                         // pointHoverBackgroundColor: '#E2D7E1',
                         // pointHoverBorderColor    : '#E2D7E1'
                    },
               ],
          },
          options: {
               maintainAspectRatio: false,
               tooltips: {
                    mode: mode,
                    intersect: intersect,
               },
               hover: {
                    mode: mode,
                    intersect: intersect,
               },
               legend: {
                    display: false,
               },
               scales: {
                    yAxes: [
                         {
                              // display: false,
                              gridLines: {
                                   display: true,
                                   lineWidth: '4px',
                                   color: 'rgba(0, 0, 0, .2)',
                                   zeroLineColor: 'transparent',
                              },
                              ticks: $.extend(
                                   {
                                        beginAtZero: true,
                                        suggestedMax: 200,
                                   },
                                   ticksStyle
                              ),
                         },
                    ],
                    xAxes: [
                         {
                              display: true,
                              gridLines: {
                                   display: false,
                              },
                              ticks: ticksStyle,
                         },
                    ],
               },
          },
     });
});

// lgtm [js/unused-local-variable]
