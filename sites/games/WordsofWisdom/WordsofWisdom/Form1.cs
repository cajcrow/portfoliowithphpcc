﻿using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WordsofWisdom
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void label1_MouseEnter(object sender, EventArgs e)
        {
            label1.BackColor = System.Drawing.Color.White;
        }

        private void label2_MouseEnter(object sender, EventArgs e)
        {
            label2.BackColor = System.Drawing.Color.White;
        }

        private void label3_MouseEnter(object sender, EventArgs e)
        {
            label3.BackColor = System.Drawing.Color.White;
        }

        private void label4_MouseEnter(object sender, EventArgs e)
        {
            label4.BackColor = System.Drawing.Color.White;
        }
    }
}
