Imports System.Data.OleDb

Public Class home

    Inherits System.Web.UI.Page

    Dim con As New OleDbConnection("Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\parth\sem5\asp\User.mdb")
    Dim cmd As New OleDbCommand
    Dim ad As New OleDbDataAdapter
    Dim ds As New DataSet

    Sub Display()

        con.Open()
        cmd.CommandText = "select * from PVR "
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        ad.Fill(ds, "PVR")
        GridView1.DataSource = ds.Tables("PVR")
        con.Close()
        GridView1.DataBind()

    End Sub
    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Display()

    End Sub


    Protected Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        con.Open()
        cmd.CommandText = "INSERT INTO PVR VALUES(@ID, @Uname, @City)"
        cmd.Parameters.AddWithValue("@ID", Val(TextBox2.Text))
        cmd.Parameters.AddWithValue("@Uname", TextBox3.Text)
        cmd.Parameters.AddWithValue("@City", TextBox4.Text)
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        cmd.Parameters.Clear()
        ds.Clear()
        con.Close()

        Display()

    End Sub

    Protected Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
        con.Open()
        cmd.CommandText = "UPDATE PVR SET Uname='" & TextBox3.Text & "', City='" & TextBox4.Text & "' WHERE ID=" & Val(TextBox2.Text)
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        cmd.Parameters.Clear()
        ds.Clear()
        con.Close()

        Display()
    End Sub

    Protected Sub Button3_Click(sender As Object, e As EventArgs) Handles Button3.Click
        con.Open()
        cmd.CommandText = "DELETE FROM PVR WHERE ID=@ID"
        cmd.Parameters.AddWithValue("@ID", Val(TextBox2.Text))
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        cmd.Parameters.Clear()
        ds.Clear()
        con.Close()

        Display()
    End Sub

    Protected Sub Button4_Click(sender As Object, e As EventArgs) Handles Button4.Click
        con.Open()
        cmd.CommandText = "select * from PVR Where ID=@ID"
        cmd.Parameters.AddWithValue("@ID", Val(TextBox2.Text))
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        ds.Clear()
        ad.Fill(ds, "PVR")
        GridView1.DataSource = ds.Tables("PVR")
        con.Close()
        GridView1.DataBind()
    End Sub
End Class